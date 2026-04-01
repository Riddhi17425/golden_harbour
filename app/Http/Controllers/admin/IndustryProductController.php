<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryProduct;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class IndustryProductController extends Controller
{
    public function index()
    {
        $data = IndustryProduct::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.industryproduct.industryproductlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.industryproduct.addindustryproduct');
    }

    public function store(Request $request)
    {
        $post = new IndustryProduct;
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_industry_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/industryproduct')->with('success', 'Industry Added Successfully');
    }

    public function edit($id)
    {
        $data = IndustryProduct::find($id);
        $categories = Category::all();
        return view('admin.industryproduct.editindustryproduct', compact('data','categories'));
    }

    public function update(Request $request, $id)
    {
        $post = IndustryProduct::find($id);
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_industry_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  

        $post->save();

        return redirect('/admin/industryproduct')->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $data = IndustryProduct::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Industry Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Industry not found!');
    }
}