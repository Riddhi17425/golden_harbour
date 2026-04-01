<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agencies;
use Illuminate\Http\Request;

class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agencies::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.agencies.agencieslisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agencies.addagencies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules...
        $validatedData = $request->validate([
            'title' => 'required',

        ], [
            'title.required' => 'Please enter the principals name.',

        ]);

        $post = new Agencies;

        $post->title = $request->get('title');
        $post->material  = $request->get('material');
        $post->country = $request->get('country');
        $post->website = $request->get('website');

        if($request->hasFile('principals_logo')) {
            $file = $request->file('principals_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/our_principals_logos');
            $file->move($path, $filename);
            $post->principals_logo = $filename;
        }
        if($request->hasFile('flag_logo')) {
            $file = $request->file('flag_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/our_principals_flag');
            $file->move($path, $filename);
            $post->flag_logo = $filename;
        }
       
      

        $post->save();
        return redirect('/admin/agencies')->with('success', 'Agencies Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Agencies::find($id);
        return view('admin.agencies.editagencies', compact('data'));
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
         $post = Agencies::find($id);
     
         $post->title = $request->get('title');
         $post->material  = $request->get('material');
         $post->country = $request->get('country');
         $post->website = $request->get('website');

        if($request->hasFile('principals_logo')) {
            $file = $request->file('principals_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/our_principals_logos');
            $file->move($path, $filename);
            $post->principals_logo = $filename;
        }
        if($request->hasFile('flag_logo')) {
            $file = $request->file('flag_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/our_principals_flag');
            $file->move($path, $filename);
            $post->flag_logo = $filename;
        }

        $post->save();
     
         return redirect('/admin/agencies')->with('success', 'Agencies updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = Agencies::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Agencies Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'Agencies not found!');
       
    }


}