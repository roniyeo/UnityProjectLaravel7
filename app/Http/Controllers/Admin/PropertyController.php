<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Aminities;
use App\Model\Admin\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use File;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::latest()->get();
        return view('admin.property.index', ['properties' => $property]);
    }

    public function show($id)
    {
        $property = Property::find($id);
        return view('admin.property.show', ['properties' => $property]);
    }

    public function create()
    {
        $query = DB::table('properties')->select(DB::raw('MAX(RIGHT(kode,7)) as kode'));
        $kdpro = "";
        if ($query->count() > 0) {
            foreach ($query->get() as $k) {
                $tmp = ((int) $k->kode)+1;
                $kdpro = sprintf("%07s", $tmp);
            }
        }else{
            $kdpro = "0000001";
        }
        $aminities = DB::table('aminities')->get();
        $tipe = DB::table('tipe_price')->get();
        $province = Province::pluck('name', 'id');
        return view('admin.property.create', ['aminitiess' => $aminities, 'tipe_prices' => $tipe, 'provinces' => $province], compact('kdpro'));
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->title);
        $property = new Property();
        if ($request->kategori == 'sale') {
            if ($request->kondisi == 'new') {
                $property->kode = $request->kode;
                $property->title = $request->title;
                $property->title_slug = $slug;
                $property->price = $request->price;
                $property->purpose = $request->kategori;
                $property->kondisi = $request->kondisi;
                $property->type = $request->tipe;
                $property->floor = $request->floor;
                $property->bedroom = $request->bedroom;
                $property->bathroom = $request->bathroom;
                $property->luas_bangunan = $request->luas_bangunan;
                $property->luas_tanah = $request->luas_tanah;
                $property->provinsi = $request->provinsi;
                $property->kota = $request->kota;
                $property->daerah = $request->daerah;
                $property->address = $request->alamat;
                $property->maps = $request->maps;
                $property->description = $request->deskripsi;
                $property->nearby = $request->nearby;
                $image = $request->file('cover_image');
                if ($request->file('cover_image')) {
                    $currentDate = Carbon::now()->toDateString();
                    $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property')){
                        Storage::disk('public')->makeDirectory('property');
                    }
                    $image->storeAs('property', $imageName, 'cover');
                    $property->cover_image = $imageName;
                }
                $video = $request->file('video');
                if ($video) {
                    $currentDate = Carbon::now()->toDateString();
                    $videoName = 'VIDEO-'.$slug.'-'.$currentDate.'-'.uniqid().'.'.$video->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property/video')){
                        Storage::disk('public')->makeDirectory('property/video');
                    }
                    $video->storeAs('property', $videoName, 'video');
                    $property->video = $videoName;
                }
                $pricelist = $request->file('price_list');
                if ($pricelist) {
                    $currentDate = Carbon::now()->toDateString();
                    $price = 'PL-'.$slug.'-'.$currentDate.'-'.uniqid().'.'.$pricelist->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property/pricelist')){
                        Storage::disk('public')->makeDirectory('property/pricelist');
                    }
                    $pricelist->storeAs('property/pricelist', $price, 'pricelist');
                    $property->price_list = $price;
                }

                $siteplan = $request->file('site_plan');
                if ($siteplan) {
                    $currentDate = Carbon::now()->toDateString();
                    $site = 'SP-'.$slug.'-'.$currentDate.'-'.uniqid().'.'.$siteplan->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property/siteplan')){
                        Storage::disk('public')->makeDirectory('property/siteplan');
                    }
                    $siteplan->storeAs('property/siteplan', $site, 'siteplan');
                    $property->site_plan = $site;
                }

                $brosur = $request->file('e_brosur');
                if ($brosur) {
                    $currentDate = Carbon::now()->toDateString();
                    $ebrosur = 'B-'.$slug.'-'.$currentDate.'-'.uniqid().'.'.$brosur->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property/brosur')){
                        Storage::disk('public')->makeDirectory('property/brosur');
                    }
                    $brosur->storeAs('property/brosur', $ebrosur, 'brosur');
                    $property->brosur = $ebrosur;
                }
                $property->agent = Auth::user()->kode_unity;
                $property->save();

                $property->aminities()->attach($request->aminities);
                $foto = $request->hasFile('foto_property');
                if ($foto) {
                    foreach ($request->file('foto_property') as $image) {
                        $currentDate = Carbon::now()->toDateString();
                        $images['name'] = 'Foto-'. $slug . '-' . $currentDate . '-' . uniqid(). '.' . $image->getClientOriginalExtension();
                        $images['size'] = $image->getSize();
                        $images['property_id'] = $property->agent;

                        if(!Storage::disk('public')->exists('property/gallery')){
                            Storage::disk('public')->makeDirectory('property/gallery');
                        }
                        $image->storeAs('property/gallery', $images['name'], 'foto');
                        $property->gallery()->create($images);
                    }
                }
                return redirect()->route('property')->with('success', 'Tambah New Property Berhasil');
            }else if ($request->kondisi == 'secondary') {
                $property->kode = $request->kode;
                $property->title = $request->title;
                $property->title_slug = $slug;
                $property->price = $request->price;
                $property->purpose = $request->kategori;
                $property->kondisi = $request->kondisi;
                $property->type = $request->tipe;
                $property->floor = $request->floor;
                $property->bedroom = $request->bedroom;
                $property->bathroom = $request->bathroom;
                $property->luas_bangunan = $request->luas_bangunan;
                $property->luas_tanah = $request->luas_tanah;
                $property->provinsi = $request->provinsi;
                $property->kota = $request->kota;
                $property->daerah = $request->daerah;
                $property->address = $request->alamat;
                $property->maps = $request->maps;
                $property->description = $request->deskripsi;
                $property->nearby = $request->nearby;
                $image = $request->file('cover_image');
                if ($request->file('cover_image')) {
                    $currentDate = Carbon::now()->toDateString();
                    $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists('property')){
                        Storage::disk('public')->makeDirectory('property');
                    }
                    $image->storeAs('property', $imageName, 'cover');
                    $property->cover_image = $imageName;
                }
                $property->agent = Auth::user()->kode_unity;
                $property->save();

                $property->aminities()->attach($request->aminities);
                $foto = $request->hasFile('foto_property');
                if ($foto) {
                    foreach ($request->file('foto_property') as $image) {
                        $currentDate = Carbon::now()->toDateString();
                        $images['name'] = 'Foto-'. $slug . '-' . $currentDate . '-' . uniqid(). '.' . $image->getClientOriginalExtension();
                        $images['size'] = $image->getSize();
                        $images['property_id'] = $property->agent;

                        if(!Storage::disk('public')->exists('property/gallery')){
                            Storage::disk('public')->makeDirectory('property/gallery');
                        }
                        $image->storeAs('property/gallery', $images['name'], 'foto');
                        $property->gallery()->create($images);
                    }
                }
                return redirect()->route('property')->with('success', 'Tambah Secondary Property Berhasil');
            }else{
                return redirect()->route('property')->with('error', 'Pilih kondisi dulu');
            }
        }else if ($request->kategori == 'rent') {
            $property->kode = $request->kode;
            $property->title = $request->title;
            $property->title_slug = $slug;
            $property->price = $request->price;
            $property->tipe_price = $request->tipe_price;
            $property->purpose = $request->kategori;
            $property->kondisi = $request->kondisi;
            $property->type = $request->tipe;
            $property->floor = $request->floor;
            $property->bedroom = $request->bedroom;
            $property->bathroom = $request->bathroom;
            $property->luas_bangunan = $request->luas_bangunan;
            $property->luas_tanah = $request->luas_tanah;
            $property->provinsi = $request->provinsi;
            $property->city = $request->kota;
            $property->daerah = $request->daerah;
            $property->address = $request->alamat;
            $property->maps = $request->maps;
            $property->description = $request->deskripsi;
            $property->nearby = $request->nearby;
            $image = $request->file('cover_image');
            if ($request->file('cover_image')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('property')){
                    Storage::disk('public')->makeDirectory('property');
                }
                $image->storeAs('property', $imageName, 'cover');
                $property->cover_image = $imageName;
            }
            $property->agent = Auth::user()->kode_unity;
            $property->save();

            $property->aminities()->attach($request->aminities);
            $foto = $request->hasFile('foto_property');
            if ($foto) {
                foreach ($request->file('foto_property') as $image) {
                    $currentDate = Carbon::now()->toDateString();
                    $images['name'] = 'Foto-'. $slug . '-' . $currentDate . '-' . uniqid(). '.' . $image->getClientOriginalExtension();
                    $images['size'] = $image->getSize();
                    $images['property_id'] = $property->agent;

                    if(!Storage::disk('public')->exists('property/gallery')){
                        Storage::disk('public')->makeDirectory('property/gallery');
                    }
                    $image->storeAs('property/gallery', $images['name'], 'foto');
                    $property->gallery()->create($images);
                }
            }

            return redirect()->route('property')->with('success', 'Tambah Rent Property Berhasil');
        }else{
            return redirect()->route('property')->with('error', 'Pilih kategori dulu');
        }
    }

    public function edit($kode)
    {
        $property = Property::where('kode', $kode)->firstOrFail();
        $province = Province::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $district = District::pluck('name', 'id');
        $aminities = Aminities::all();
        return view('admin.property.edit', compact('property', 'province', 'cities', 'district', 'aminities'));
    }

    public function getKota(Request $request)
    {
        $kota = City::where('province_id', $request->id)->pluck('id', 'name');
        return response()->json($kota);
    }

    public function getDaerah(Request $request)
    {
        $daerah = District::where('city_id', $request->city_id)->pluck('id', 'name');
        return response()->json($daerah);
    }
}
