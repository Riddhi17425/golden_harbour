<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{
    public function index()
    {
        $data = WhyChoose::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.whychoose.whychooselisting', compact('data'));
    }

    public function create()
    {
        return view('admin.whychoose.addwhychoose');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'alt'=> 'required',
        ], [
            'title.required' => 'Please Enter the name.',
            'description.required'=> 'Please Enter the description.',
            'alt.required'=> 'Please Enter the designation.',
        ]);

        $post = new WhyChoose;
        $post->title = $request->get('title');
        $post->description = $request->get('description');  
        $post->alt = $request->get('alt');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/whychoose_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/whychoose')->with('success', 'Why Choose Added Successfully');
    }

    public function edit($id)
    {
        $data = WhyChoose::find($id);
        return view('admin.whychoose.editwhychoose', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = WhyChoose::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->alt = $request->get('alt');
     
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/whychoose_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/whychoose')->with('success', 'Why Choose Updated Successfully');
    }

    public function destroy($id)
    {
        $data = WhyChoose::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Why Choose Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Why Choose not found!');
    }
}