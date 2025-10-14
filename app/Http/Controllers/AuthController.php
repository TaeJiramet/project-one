<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))->with('success', 'เข้าสู่ระบบเรียบร้อยแล้ว');
        }

        return back()->withErrors(['email' => 'ข้อมูลการเข้าสู่ระบบไม่ถูกต้อง'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Regenerate the session token again to prevent session fixation
        $request->session()->regenerateToken();
        
        return redirect()->to(route('home') . '?logout=1');
    }
}
