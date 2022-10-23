<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('slideshow')->get();
        return view('admin.slider.index', ['slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'slider' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('slider');
        $imageName =  time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('slider'), $imageName);
        DB::table('slideshow')->insert([
            'image' => $imageName,
        ]);
        return redirect()->route('slider')->with('success', 'Created Slider');
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
        $slider = DB::table('slideshow')->where('id', $id)->get();
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'slider' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('slider');

        if ($image) {
            $imageName =  time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('slider'), $imageName);
        }else{
            unset($input['image']);
        }

        DB::table('slideshow')->where('id', $id)->update(['image' => $imageName]);
        return redirect()->route('slider')->with('success', 'Updated Slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('slideshow')->where('id', $id)->delete();
        return redirect()->route('slider')->with('success', 'Deleted Slider');
    }
}
