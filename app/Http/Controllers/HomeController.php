<?php

namespace App\Http\Controllers;

use App\Model\Agents;
use App\Model\Property;
use App\Model\Tipeprice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;

class HomeController extends Controller
{

    public function index()
    {
        $cities = City::pluck('name', 'id');
        $agents = Agents::all();
        $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id");
        return view('home', ['agents' => $agents, 'properties' => $properties],compact('cities'));
    }

    public function agents()
    {
        $kode = array();
        $agents = Agents::all();
        foreach ($agents as $agent) {
            $kode = $agent->kode_unity;
        }
        // dd($kode);
        $total = Property::where('agent', $kode)->count();
        return view('agents', ['agents' => $agents], compact('total'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blog()
    {
        return view('blog');
    }

    public function property()
    {
        $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id");
        return view('properties', ['properties' => $properties]);
    }
}
