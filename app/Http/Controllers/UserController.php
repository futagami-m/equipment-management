<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //ユーザー一覧表示
    public function users(){
        //今ログインしているユーザーを表示
        $user = Auth::user();

       if( $user->role == 1 ) {
            $users = User::all();   
        }      
        else{ $users = [$user];}

        
        return view('users.users', compact('users'));
    }

    //編集画面表示
    public function edit(Request $request){
        
        $user = User::where('id','=',$request->id)->first();
        
        return view('users.edit')->with([
            'user' => $user,
        ]);
        }

    //削除する
    public function memberDelete(Request $request){
        $user = User::where('id','=',$request->id)->first();
        //ユーザーIDが自分のIDだったら削除してログイン画面へ遷移
        if(($user->id == Auth::id())) {
            $user->delete();
            return redirect('/');
            }
            $user->delete();
        return redirect('/users');
            
}
    

}