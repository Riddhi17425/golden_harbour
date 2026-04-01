<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeSlider::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.homeslider.homesliderlisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeslider.addhomeslider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new HomeSlider;

        $post->name = $request->get('name');
        $post->alt = $request->get('alt');
    
        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/homeslider');
            $file->move($path, $filename);
            $post->slider_image = $filename;
        }
       
        $post->save();
        return redirect('/admin/homeslider')->with('success', 'Homeslider Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = HomeSlider::find($id);
        return view('admin.homeslider.edithomeslider', compact('data'));
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
         $post = Homeslider::find($id);
     
        $post->name = $request->get('name');
        $post->alt = $request->get('alt');

        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/homeslider');
            $file->move($path, $filename);
            $post->slider_image = $filename;
        }

        $post->save();
     
         return redirect('/admin/homeslider')->with('success', 'Homeslider updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = HomeSlider::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Homeslider Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'Homeslider not found!');
       
    }


}