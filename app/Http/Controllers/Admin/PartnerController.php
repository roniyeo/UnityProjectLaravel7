<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = DB::table('partners')->get();
        return view('admin.partners.index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slugName = Str::slug($request->nama);
        $image = $request->file('logo');
        $imageName =  time() . '-' . $slugName . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('partners'), $imageName);
        DB::table('partners')->insert([
            'title' => $request->nama,
            'image' => $imageName,
        ]);
        return redirect()->route('partners')->with('success', 'Created Partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = DB::table('partners')->where('id', $id)->get();
        return view('admin.partners.edit', ['partners' => $partners]);
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
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('logo');
        $slugName = Str::slug($request->nama);

        if ($image) {
            $imageName =  time() . '-' . $slugName . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('partners'), $imageName);
        }else{
            unset($input['image']);
        }

        DB::table('partners')->where('id', $request->id)->update(['title' => $request->nama,'image' => $imageName]);
        return redirect()->route('partners')->with('success', 'Updated Partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('partners')->where('id', $id)->delete();
        return redirect()->route('partners')->with('success', 'Deleted Partners');
    }
}
