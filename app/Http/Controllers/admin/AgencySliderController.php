<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AgencySlider;
use Illuminate\Http\Request;

class AgencySliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AgencySlider::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.agencyslider.agencysliderlisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agencyslider.addagencyslider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new AgencySlider;

        $post->name = $request->get('name');
        $post->alt = $request->get('alt');
    
        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/agencyslider');
            $file->move($path, $filename);
            $post->slider_image = $filename;
        }
       
        $post->save();
        return redirect('/admin/agencyslider')->with('success', 'Agencyslider Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AgencySlider::find($id);
        return view('admin.agencyslider.editagencyslider', compact('data'));
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
         $post = AgencySlider::find($id);
     
        $post->name = $request->get('name');
        $post->alt = $request->get('alt');

        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/agencyslider');
            $file->move($path, $filename);
            $post->slider_image = $filename;
        }

        $post->save();
     
         return redirect('/admin/agencyslider')->with('success', 'Agencyslider updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = AgencySlider::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your AgencySlider Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'AgencySlider not found!');
       
    }


}