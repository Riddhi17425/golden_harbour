<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.news.newslisting', compact('data'));
    }

    public function create()
    {
        return view('admin.news.addnews');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please Enter the News name.',
        ]);

        $post = new News;
        $post->title = $request->get('title');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->short_description = $request->get('short_description');
        $post->description = $request->get('description');
        $post->cta_image_text = $request->get('cta_image_text');
        $post->conclusion = $request->get('conclusion');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
       
 
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/news_detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }  

        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/news_front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        } 
        
        $post->save();

        return redirect('/admin/news')->with('success', 'News Added Successfully');
    }

    public function edit($id)
    {
        $data = News::find($id);
        return view('admin.news.editnews', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = News::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->short_description = $request->get('short_description');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->cta_image_text = $request->get('cta_image_text');
        $post->conclusion = $request->get('conclusion');
        $post->url = $request->get('url');
        $post->alt = $request->get('alt');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
       
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/news_detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }  

        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/news_front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        } 

       $post->save();
        return redirect('/admin/news')->with('success', 'News Updated Successfully');
    }

    public function destroy($id)
    {
        $data = News::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your News Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'News not found!');
    }
}