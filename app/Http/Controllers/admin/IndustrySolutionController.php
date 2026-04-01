<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IndustrySolution;
use Illuminate\Http\Request;

class IndustrySolutionController extends Controller
{
    public function index()
    {
        $data = IndustrySolution::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.industrysolution.industrysolutionlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.industrysolution.addindustrysolution');
    }

    public function store(Request $request)
    {
        

        $post = new IndustrySolution;
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industrysolution_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  
        $post->save();

        return redirect('/admin/industrysolution')->with('success', 'Industry Solution Added Successfully');
    }

    public function edit($id)
    {
        $data = IndustrySolution::find($id);
        return view('admin.industrysolution.editindustrysolution', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = IndustrySolution::find($id);
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
       
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industrysolution_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }

        $post->save();
        return redirect('/admin/industrysolution')->with('success', 'Industry Solution Updated Successfully');
    }

    public function destroy($id)
    {
        $data = IndustrySolution::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Industry Solution Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Industry Solution not found!');
    }
}