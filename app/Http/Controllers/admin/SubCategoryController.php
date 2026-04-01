<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  
    public function index()
    {
        $data = SubCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.subcategory.subcategorylisting', compact('data'));
    }

        public function create()
    { 
        $categories = Category::wherenull('deleted_at')->get();    
        return view('admin.subcategory.addsubcategory', compact('categories'));
    }

    public function store(Request $request)
    {

        $post = new SubCategory;
        $post->category_id = $request->get('category_id');
        $post->name = $request->get('name');
        $post->title = $request->get('title');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subcategory_image');
            $file->move($path, $filename);
            $post->image = $filename;
        } 
        $post->save();
    

        return redirect('/admin/subcategory')->with('success', 'SubCategory Added Successfully');
    }

    public function edit($id)
    {
        $data = SubCategory::find($id);
        $categories = Category::wherenull('deleted_at')->get();
        return view('admin.subcategory.editsubcategory', compact('data','categories'));
    }

    public function update(Request $request, $id)
    {
        $post = SubCategory::find($id);
        $post->category_id = $request->get('category_id');
        $post->name = $request->get('name');
        $post->title = $request->get('title');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subcategory_image');
            $file->move($path, $filename);
            $post->image = $filename;
        } 
        $post->save();
        
        return redirect('/admin/subcategory')->with('success', 'SubCategory Updated Successfully');
    }

    public function destroy($id)
    {
        $data = SubCategory::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your SubCategory Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'SubCategory not found!');
    }
}