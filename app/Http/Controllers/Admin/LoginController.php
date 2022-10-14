<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:8',
        ]);

        // $data = User::where('username', $request->username)->firstOrFail();
        // if ($data) {
        //     if (Hash::check($request->password, $data->password)) {
        //         session(['success_login' => true]);
        //         return redirect()->route('dashboard');
        //     }
        // }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }
        return back()->with('message', 'Username atau password salah');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
