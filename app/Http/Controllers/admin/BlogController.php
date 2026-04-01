<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.blog.listing', compact('data'));
    }

    public function create()
    {
        return view('admin.blog.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please Enter the Blog name.',
        ]);

        $post = new Blog;
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_tag = $request->get('meta_tag');
        $post->meta_description = $request->get('meta_description');
 
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/blog_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  

        if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/blog_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }  
        $post->save();

        return redirect('/admin/blog')->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Blog::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_tag = $request->get('meta_tag');
        $post->meta_description = $request->get('meta_description');
       
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/blog_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/blog_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }
       

        $post->save();
        return redirect('/admin/blog')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Blog::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Blog Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Blog not found!');
    }
}