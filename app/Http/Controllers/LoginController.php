<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) { // ログイン試行
                $request->session()->regenerate(); // セッション更新

                return redirect()->intended(RouteServiceProvider::ADMIN_HOME); // ダッシュボードへ
        }

        return back()->withErrors([ // ログインに失敗した場合
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
