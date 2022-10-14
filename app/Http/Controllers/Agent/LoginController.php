<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Agent\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('agent.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            array(
                    'username' => $request->username,
                    'password' => $request->password
                ),
            array(
                    'username'    => 'required',
                    'password' => 'required|min:6',
                )
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $agents = UserAgent::where('username', $request->username)->first();
            if ($agents) {
                if (Hash::check($request->password, $agents->password)) {
                    $request->session()->put('kode_unity', $agents->kode_unity);
                    session(['agent_login' => true]);
                    return redirect()->route('portal');
                }else{
                    return back()->with('fail', 'Password not match');
                }
            }else{
                return back()->with('fail', 'Anda belum active sebagai agent');
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('agent.login');
    }
}
