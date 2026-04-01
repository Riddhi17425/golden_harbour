<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $data = Industry::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.industry.industrylisting', compact('data'));
    }

    public function create()
    {
        return view('admin.industry.addindustry');
    }

    public function store(Request $request)
    {
        $post = new Industry;
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->sub_title = $request->get('sub_title');
        $post->description = $request->get('description');
        // $post->bottom_description = $request->get('bottom_description');
        $post->alt = $request->get('alt');

        if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_home_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/industry')->with('success', 'Industry Added Successfully');
    }

    public function edit($id)
    {
        $data = Industry::find($id);
        return view('admin.industry.editindustry', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Industry::find($id);
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->sub_title = $request->get('sub_title');
        $post->description = $request->get('description');
        // $post->bottom_description = $request->get('bottom_description');
        $post->alt = $request->get('alt');

        if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_home_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }
     
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/industry')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Industry::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Industry Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Industry not found!');
    }
}