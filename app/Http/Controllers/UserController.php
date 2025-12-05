<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 注册处理
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => ['required','string','max:255', Rule::unique('users','name')],
            'email'    => ['required','email', Rule::unique('users','email')],
            'password' => ['required','string','min:3'],
        ]);

        $user = User::create([
            'name'     => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect('/'); // 注册成功重定向到首页（登录页）
    }

    // 登录处理
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'loginName'     => ['required','string'],
            'loginPassword' => ['required','string'],
        ]);

        if (Auth::attempt(['name' => $credentials['loginName'], 'password' => $credentials['loginPassword']])) {
            $request->session()->regenerate();
            return redirect('/page1');
        }

        // 认证失败：返回首页并显示错误
        return back()->withErrors(['loginError' => 'The provided credentials do not match our records.']);
    }

    // page1 视图
    public function page1()
    {
        return view('page1');
    }

    // 登出
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // 显示注册页面
    public function showRegister()
    {
        return view('register'); // 对应 resources/views/register.blade.php
    }

}
