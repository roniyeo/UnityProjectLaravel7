<?php

namespace App\Http\Controllers;

use App\Model\Agents;
use App\Model\Property;
use App\Model\Tipeprice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class HomeController extends Controller
{

    public function index()
    {
        $slider = DB::table('slideshow')->limit(3)->get();
        $cities = DB::select("SELECT indonesia_cities.id AS id, indonesia_cities.name AS name, properties.city AS city_id FROM indonesia_cities LEFT JOIN properties ON indonesia_cities.id = properties.city WHERE properties.city");
        $agents = Agents::all();
        $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id");
        return view('home', ['agents' => $agents, 'properties' => $properties, 'slider' => $slider, 'cities' => $cities]);
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

    public function showAgents(Request $request, $kode)
    {
        $agent = DB::table('agents')->where('kode_unity', $kode)->get();
        $total = Property::where('agent', $kode)->count();
        $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE properties.agent = '$kode'");
        return view('single', ['agency' => $agent], compact('properties', 'total'));
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

    public function showProperty(Request $request, $kode)
    {
        // $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE properties.kode = '$kode'");
        $property = Property::where('kode', $kode)->first();
        $tipe = Tipeprice::where('id', $property->tipe_price)->first();
        $provinsi = Province::where('id', $property->provinsi)->first();
        $kota = City::where('id', $property->city)->first();
        $daerah = District::where('id', $property->daerah)->first();
        $agent = Agents::first();
        // dd($agent->kode_unity);
        // dd($property->agent);
        return view('property-details', compact('property', 'tipe', 'provinsi', 'kota', 'daerah', 'agent'));
    }

    public function searchByFilterProperty(Request $request)
    {
        $kategori = $request->kategori;
        $title = $request->title;
        $price = $request->price;
        $kota = $request->kota;
        $tipe_rumah = $request->tipe_rumah;
        $kondisi = $request->kondisi;

        if ($title) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE title LIKE '%$title%'");
        }else if ($kategori) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE purpose LIKE '%$kategori%'");
        }else if ($kota) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE city LIKE '%$kota%'");
        }else if ($tipe_rumah) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE type LIKE '%$tipe_rumah%'");
        }else if ($kondisi) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE kondisi LIKE '%$kondisi%'");
        }else if ($price) {
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE $price");
        }else{
            $properties = DB::select("SELECT properties.*, tipe_price.id, tipe_price.tipe_price AS tipe_harga, agents.kode_unity AS kode_agent, agents.nama_agent, agents.nohp, agents.foto_agent, users.kode_unity AS kode_admin, users.name FROM properties LEFT JOIN agents ON properties.agent = agents.kode_unity LEFT JOIN users ON properties.agent = users.kode_unity LEFT JOIN tipe_price ON properties.tipe_price = tipe_price.id WHERE title LIKE '%$title%' AND purpose LIKE '%$kategori%' AND city LIKE '%$kota%' AND type LIKE '%$tipe_rumah%' AND kondisi LIKE '%$kondisi%' AND $price");
        }

        // dd($properties);
        return view('search', compact('properties'));
    }
}
