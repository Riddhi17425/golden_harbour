<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index()
    {
        $data = Category::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.category.categorylisting', compact('data'));
    }

        public function create()
    { 
        return view('admin.category.addcategory');
    }

    public function store(Request $request)
    {

        $post = new Category;
        $post->name = $request->get('name');
        $post->url = $request->get('url');
        $post->heading = $request->get('heading');
        $post->subheading = $request->get('subheading');
        $post->url = $request->get('url');
        $post->short_description = $request->get('short_description');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        $post->save();

        return redirect('/admin/category')->with('success', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.editcategory', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Category::find($id);
        $post->name = $request->get('name');
        $post->heading = $request->get('heading');
        $post->subheading = $request->get('subheading');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        $post->save();
        return redirect('/admin/category')->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Category::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Category Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Category not found!');
    }

   }