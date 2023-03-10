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
            'users' => $user,
        ]);
        }


    

}