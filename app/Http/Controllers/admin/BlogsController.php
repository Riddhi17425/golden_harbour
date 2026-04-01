<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $data = Blogs::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.blog.bloglisting', compact('data'));
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
        
        $faqTitles = $request->faq_title ?? [];
        $faqDescriptions = $request->faq_description ?? [];
    
        $title_description = [];
        foreach ($faqTitles as $index => $title) {
            if (empty(trim(strip_tags($title))) || empty(trim(strip_tags($faqDescriptions[$index] ?? '')))) {
        continue;
    }
            $title_description[] = [
                'faq_title' => $title,
                'faq_description' => $faqDescriptions[$index],
            ];
        }

        $post = new Blogs;
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->conclusion = $request->get('conclusion');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->title_description = $title_description;
 
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }
        
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  
        if($request->hasFile('cta_image')) {
            $file = $request->file('cta_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/cta_image');
            $file->move($path, $filename);
            $post->cta_image = $filename;
        }

        
        $post->save();

        return redirect('/admin/blog')->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $data = Blogs::find($id);
        return view('admin.blog.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Blogs::find($id);
        $faqTitles = $request->faq_title ?? [];
            $faqDescriptions = $request->faq_description ?? [];
        
            $title_description = [];
            foreach ($faqTitles as $index => $title) {
                if (empty(trim(strip_tags($title))) || empty(trim(strip_tags($faqDescriptions[$index] ?? '')))) {
        continue;
    }
                $title_description[] = [
                    'faq_title' => $title,
                    'faq_description' => $faqDescriptions[$index],
                ];
            }
        
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->conclusion = $request->get('conclusion');    
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->title_description = $title_description;
       
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }
        
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  
        if($request->hasFile('cta_image')) {
            $file = $request->file('cta_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/cta_image');
            $file->move($path, $filename);
            $post->cta_image = $filename;
        }

        
        $post->save();
        return redirect('/admin/blog')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Blogs::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Blog Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Blog not found!');
    }
}