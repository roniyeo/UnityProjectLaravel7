<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    // Agent
    public function agent()
    {
        $agent = DB::table('agents')->get();
        return view('admin.agent.index', ['agents' => $agent]);
    }

    public function createAgent()
    {
        $query = DB::table('agents')->select(DB::raw('MAX(RIGHT(kode_unity,7)) as kode'));
        $kd = "";
        if ($query->count() > 0) {
            foreach ($query->get() as $k) {
                $tmp = ((int) $k->kode)+1;
                $kd = sprintf("%07s", $tmp);
            }
        }else{
            $kd = "2022001";
        }
        return view('admin.agent.create', compact('kd'));
    }

    public function storeAgent(Request $request)
    {
        $request->validate([
            'username' => 'required|min:6',
            'nama_agent' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'foto_agent' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('foto_agent');
        $slug_name = Str::slug($request->nama_agent);
        $new_name = $slug_name . '-' . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('agents'), $new_name);
        $default_password = Hash::make('123456');
        DB::table('agents')->insert([
            'kode_unity' => $request->kode_unity,
            'username' => $request->username,
            'password' => $default_password,
            'nama_agent' => $request->nama_agent,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'foto_agent' => $new_name,
        ]);
        return redirect()->route('agent')->with('success', 'Data Added Successfully.');
    }

    public function editAgent($kode_agent)
    {
        $agent = DB::table('agents')->where('kode_unity', $kode_agent)->get();
        return view('admin.agent.edit', ['agents' => $agent]);
    }

    public function updateAgent(Request $request)
    {
        $old_image = DB::table('agents')->where('kode_unity', $request->kode_unity)->first();

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

        DB::table('agents')->where('kode_unity', $request->kode_unity)->update([
            'password' => Hash::make($request->password),
            'nama_agent' => $request->nama_agent,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'foto_agent' => $image_name,
        ]);
        return redirect()->route('agent')->with('success', 'Data Updated Successfully');
    }

    public function changeStatusAgent(Request $request)
    {
        DB::table('agents')->where('kode_unity', $request->kode_unity)->update([
            'status' => $request->status
        ]);

        return response()->json(['success' => 'Status change successfully']);
    }

    public function deleteAgent($kode_unity)
    {
        DB::table('agents')->where('kode_unity', $kode_unity)->delete();
        return redirect()->route('agent')->with('success', 'Data Deleted Successfully');
    }

    // Aminities
    public function aminities()
    {
        $aminities = DB::table('aminities')->get();
        return view('admin.aminities.index', ['aminities' => $aminities]);
    }

    public function createAminities()
    {
        return view('admin.aminities.create');
    }

    public function storeAminities(Request $request)
    {
        $request->validate([
            'aminities' => 'required|unique:aminities,aminities',
        ]);
        DB::table('aminities')->insert([
            'aminities' => $request->aminities,
        ]);
        return redirect()->route('aminities')->with('success', 'Success created aminities');
    }

    public function editAminities($id)
    {
        $aminities = DB::table('aminities')->where('id', $id)->get();
        return view('admin.aminities.edit', ['aminities' => $aminities]);
    }

    public function updateAminities(Request $request)
    {
        DB::table('aminities')->where('id', $request->id)->update([
            'aminities' => $request->aminities,
        ]);
        return redirect()->route('aminities')->with('success', 'Success update aminities');
    }

    public function deleteAminities($id)
    {
        DB::table('aminities')->where('id', $id)->delete();
        return redirect()->route('aminities')->with('success', 'Success delete aminities');
    }

    // Tipe Price
    public function tipePrice()
    {
        $tipe = DB::table('tipe_price')->get();
        return view('admin.tipe_price.index', ['tipe_prices' => $tipe]);
    }

    public function createTipePrice()
    {
        return view('admin.tipe_price.create');
    }

    public function storeTipePrice(Request $request)
    {
        DB::table('tipe_price')->insert([
            'tipe_price' => $request->tipe_price,
        ]);
        return redirect()->route('tipeprice')->with('success', 'Type added success');
    }

    public function editTipePrice($id)
    {
        $tipe = DB::table('tipe_price')->where('id', $id)->get();
        return view('admin.tipe_price.edit', ['tipe_prices' => $tipe]);
    }

    public function updateTipePrice(Request $request)
    {
        DB::table('tipe_price')->where('id', $request->id)->update([
            'tipe_price' => $request->tipe_price,
        ]);
        return redirect()->route('tipeprice')->with('success', 'Type updated success');
    }

    public function deleteTipePrice($id)
    {
        DB::table('tipe_price')->where('id', $id)->delete();
        return redirect()->route('tipeprice')->with('success', 'Type deleted success');
    }


}
