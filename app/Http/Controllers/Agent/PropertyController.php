<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Admin\Tipeprice;
use App\Model\Agent\Aminities;
use App\Model\Agent\Property;
use App\Model\Agent\PropertyImageGalleries;
use App\Model\Agent\TipePrice as AgentTipePrice;
use App\Model\Agent\UserAgent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        $property = Property::where('agent', $request->session()->get('kode_unity'))->first();
        return view('agent.property.index', compact('data', 'property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
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
        return view('agent.property.create', ['aminities' => $aminities, 'tipe' => $tipe],compact('data','kdpro','province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->title);
        $property = new Property();
        if ($request->kategori == 'sale') {
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
            $property->city = $request->kota;
            $property->daerah = $request->daerah;
            $property->address = $request->alamat;
            $property->maps = $request->maps;
            $property->description = $request->deskripsi;
            $property->nearby = $request->nearby;
            $image = $request->file('cover');
            if ($request->file('cover')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('property')){
                    Storage::disk('public')->makeDirectory('property');
                }
                $image->storeAs('property', $imageName, 'cover');
                $property->cover_image = $imageName;
            }
            $property->agent = $request->session()->get('kode_unity');
            $property->save();

            $property->aminities()->attach($request->aminities);
            $foto = $request->hasFile('foto');
            if ($foto) {
                foreach ($request->file('foto') as $image) {
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

            return redirect()->route('agent.property')->with('success', 'Tambah Second Property Berhasil');
        }else if ($request->kategori == 'rent') {
            $property->kode = $request->kode;
            $property->title = $request->title;
            $property->title_slug = $slug;
            $property->price = $request->price;
            $property->tipe_price = $request->tipe_price;
            $property->purpose = $request->kategori;
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
            $image = $request->file('cover');
            if ($request->file('cover')) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('property')){
                    Storage::disk('public')->makeDirectory('property');
                }
                $image->storeAs('property', $imageName, 'cover');
                $property->cover_image = $imageName;
            }
            $property->agent = $request->session()->get('kode_unity');
            $property->save();

            $property->aminities()->attach($request->aminities);
            $foto = $request->hasFile('foto');
            if ($foto) {
                foreach ($request->file('foto') as $image) {
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

            return redirect()->route('agent.property')->with('success', 'Tambah Rent Property Berhasil');
        }else{
            return back()->with('error', 'Pilih kategori dulu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $kode)
    {
        $property = Property::where('kode', $kode)->firstOrFail();
        $tipe = Tipeprice::where('id', $property->tipe_price)->first();
        $provinsi = Province::where('id', $property->provinsi)->first();
        $kota = City::where('id', $property->city)->first();
        $daerah = District::where('id', $property->daerah)->first();
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        return view('agent.property.show', compact('data', 'property', 'tipe', 'provinsi', 'kota', 'daerah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode)
    {
        $data = array();
        if ($request->session()->has('kode_unity')) {
            $data = UserAgent::where('kode_unity', $request->session()->get('kode_unity'))->first();
        }
        $property = Property::where('kode', $kode)->firstOrFail();
        $province = Province::pluck('name', 'id');
        $cities = City::where('id', $property->city)->firstOrFail();
        $district = District::where('id', $property->daerah)->firstOrFail();
        $aminities = Aminities::all();
        $tipe = DB::table('tipe_price')->get();
        return view('agent.property.edit', ['tipe' => $tipe],compact('data','property', 'province', 'cities', 'district', 'aminities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slug  = Str::slug($request->title);
        $property = Property::where('kode', $request->kode)->firstOrFail();
        $property->title = $request->title;
        $property->title_slug = $slug;
        $property->price = $request->price;
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
        $image = $request->file('cover');
        if ($request->file('cover')) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('property')){
                Storage::disk('public')->makeDirectory('property');
            }
            if(Storage::disk('public')->exists('property/'.$property->image)){
                Storage::disk('public')->delete('property/'.$property->image);
            }
            $image->storeAs('property', $imageName, 'cover');
            $property->cover_image = $imageName;
        }else{
            $imageName = $property->cover_image;
        }
        $property->save();
        $property->aminities()->sync($request->aminities);
        $foto = $request->hasFile('foto');
        if ($foto) {
            foreach ($request->file('foto') as $image) {
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

        return redirect()->route('agent.property')->with('success', 'Updated Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $property = Property::where('kode', $request->kode);

        if(Storage::disk('public')->exists('property/'.$property->cover_image)){
            Storage::disk('public')->delete('property/'.$property->cover_image);
        }

        $property->delete();
        $galleries = $property->gallery;

        if($galleries)
        {
            foreach ($galleries as $key => $gallery) {
                if(Storage::disk('public')->exists('property/gallery/'.$gallery->name)){
                    Storage::disk('public')->delete('property/gallery/'.$gallery->name);
                }
                PropertyImageGalleries::destroy($gallery->id);
            }
        }

        $property->features()->detach();
        return redirect()->route('agent.property')->with('success', 'Deleted Data Berhasil');
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

    public function galleryImageDelete(Request $request){

        $gallaryimg = PropertyImageGalleries::find($request->id)->delete();

        if(Storage::disk('public')->exists('property/gallery/'.$request->image)){
            Storage::disk('public')->delete('property/gallery/'.$request->image);
        }
        if($request->ajax()){
            return response()->json(['msg' => $gallaryimg]);
        }
    }
}
