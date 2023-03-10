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
}
