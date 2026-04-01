<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\IndustryProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::with('subcategory')->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        $data = $query->paginate(15);
        //$data = Product::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.product.productlisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::wherenull('deleted_at')->get();
        $subcategories = SubCategory::wherenull('deleted_at')->get();
        $industryProducts  = IndustryProduct::wherenull('deleted_at')->get();
        $data = null;
        return view('admin.product.addproduct', compact('categories','subcategories','industryProducts','data'));
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

        $post = new Product;

        $post->title = $request->get('title');
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->url = $request->get('url');
        $post->short_description = $request->get('short_description');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->product_description = $request->get('product_description');
        $post->datasheet_title = $request->get('datasheet_title');
        $post->datasheet_description = $request->get('datasheet_description');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $industries = $request->input('industries');
        $post->industries = !empty($industries) ? json_encode($industries) : null;
       
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        } 
        if($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_pdf');
            $file->move($path, $filename);
            $post->pdf = $filename;
        } 
       

        $post->save();
        return redirect('/admin/product')->with('success', 'product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::wherenull('deleted_at')->get();
        $subcategories = Subcategory::where('category_id', $data->category_id)->get();
        $industryProducts = IndustryProduct::all();
        return view('admin.product.editproduct', compact('data', 'categories', 'subcategories','industryProducts'));
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
         $post = Product::find($id);
     
        $post->title = $request->get('title');
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->url = $request->get('url');
        $post->short_description = $request->get('short_description');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->product_description = $request->get('product_description');
        $post->datasheet_title = $request->get('datasheet_title');
        $post->datasheet_description = $request->get('datasheet_description');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->industries = $request->industries;
     
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        } 
        if($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $path = public_path('/product_pdf');
            $file->move($path, $filename);
            $post->pdf = $filename;
        } 

         //remove image name 
         $deletedImages = $request->input('deleted_images');
         if ($deletedImages) {
             $deletedImages = json_decode($deletedImages, true) ?? [];
         } else {
             $deletedImages = []; 
         }
     
         if (!empty($deletedImages)) {
             $currentImages = json_decode($post->detail_images, true) ?? [];
     
             foreach ($deletedImages as $image) {
                 $imagePath = public_path('product_detail_files/' . $image);
                 if (file_exists($imagePath)) {
                     unlink($imagePath); 
                 }
             }
     
             $currentImages = array_filter($currentImages, fn($image) => !in_array(basename($image), $deletedImages));
             $post->detail_images = json_encode(array_values($currentImages)); 
         }
     
         if ($request->hasFile('detail_images')) {
             $files = $request->file('detail_images');
             $imagePaths = json_decode($post->detail_images, true) ?? [];
             foreach ($files as $file) {
                 $filename = $file->getClientOriginalName();
                 $path = public_path('/product_detail_files');
                 $file->move($path, $filename);
                 $imagePaths[] =  $filename;
             }
             $post->detail_images = json_encode($imagePaths);
         }
     
         $post->save();
     
         return redirect('/admin/product')->with('success', 'Product updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = Product::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your product Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'product not found!');
       
    }


}