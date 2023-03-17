<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AccountController extends Controller
{

    /**
     * ログイン画面表示
     * 
     * @param Request $request
     * @return Response
     */
    public function login()
    {
        if (Auth::check()) {
            // ユーザーはログイン済み
            return redirect('/home');
        }
        
        return view('login');
    }

    /**
     * ログイン認証
     * 
     * @param Request $request
     * @return Response
     */
    public function auth(Request $request)
    {
        $user_info = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ログインに成功したとき
        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        // 上記のif文でログインに成功した人以外(=ログインに失敗した人)がここに来る
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }
    /**
     * ログアウト処理
     * 
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
            
        return redirect('/')->with('flash_message', 'ログアウトしました');
    }

}
