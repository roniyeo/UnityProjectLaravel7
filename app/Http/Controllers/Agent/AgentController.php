<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Agent\Property;
use App\Model\Agent\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        $property = Property::where('agent', $request->session()->get('kode_unity'))->count();
        $pending = Property::where([['agent', $request->session()->get('kode_unity')],['status', 0]])->count();
        $approved = Property::where([['agent', $request->session()->get('kode_unity')],['status', 1]])->count();
        return view('agent.portal', compact('data', 'property', 'pending', 'approved'));
    }

    public function listNewProperty(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        $property = Property::where('kondisi', 'new')->get();
        return view('agent.newproperty.index', compact('data', 'property'));
    }

    public function profile(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        return view('agent.profile.index', compact('data'));
    }

    public function editProfile(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        return view('agent.profile.edit', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $old_image = DB::table('agents')->where('kode_unity', $request->session()->get('kode_unity'))->first();

        $slug_name = Str::slug($request->nama_agent);
        $image_name = $request->hidden_image;
        $image = $request->file('foto_agent');

        if ($old_image->foto_agent == 'photo_defaults.jpg') {
            if($image != '')
            {
                $image_name = $slug_name . '-' . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('agents'), $image_name);
            }
        }else{
            if($image != '')
            {
                $image_name = $slug_name . '-' . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('agents'), $image_name);
                unlink('agents/'.$old_image->foto_agent);
            }
        }

        DB::table('agents')->where('kode_unity', $request->session()->get('kode_unity'))->update([
            'nama_agent' => $request->nama_agent,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'foto_agent' => $image_name,
        ]);
        return redirect()->route('agent.profile')->with('success', 'Data Updated Successfully');
    }

    public function changePassword(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        return view('agent.changepassword', compact('data'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        $new_password = Hash::make($request->password);
        DB::table('agents')->where('kode_unity', $request->session()->get('kode_unity'))->update([
            'password' => $new_password,
        ]);

        return back()->with('success', 'Change Password Success');
    }
}
