<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\Concerns\StoresFaqJson;
use App\Models\SubProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubProductController extends Controller
{
    use StoresFaqJson;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $query = SubProduct::with('product')->orderBy('created_at', 'desc');
         $query = SubProduct::with(['product', 'subcategory.category'])->orderBy('created_at', 'desc');
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        $data = $query->paginate(15);
        //$data = SubProduct::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.subproduct.subproductlisting', compact('data'));
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
        $products = Product::wherenull('deleted_at')->get();
        return view('admin.subproduct.addsubproduct', compact('categories','subcategories','products'));
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

        $post = new SubProduct;

        $post->title = $request->get('title');
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->product_id = $request->get('product_id');
        $post->url = $request->get('url');
        $post->short_description = $request->get('short_description');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->product_description = $request->get('product_description');
        $post->datasheet_title = $request->get('datasheet_title');
        $post->datasheet_description = $request->get('datasheet_description');
        $post->industry_title_1 = $request->get('industry_title_1');
        $post->industry_description_1 = $request->get('industry_description_1');
        $post->industry_title_2 = $request->get('industry_title_2');
        $post->industry_description_2 = $request->get('industry_description_2');
        $post->industry_title_3 = $request->get('industry_title_3');
        $post->industry_description_3 = $request->get('industry_description_3');
        $post->industry_title_4 = $request->get('industry_title_4');
        $post->industry_description_4 = $request->get('industry_description_4');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->front_image_alt = $request->get('front_image_alt');
        $post->faqs = $this->makeFaqList($request);
       
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_front_image');
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
        if($request->hasFile('industry_image_1')) {
            $file = $request->file('industry_image_1');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry1');
            $file->move($path, $filename);
            $post->industry_image_1 = $filename;
        } 
        if($request->hasFile('industry_image_2')) {
            $file = $request->file('industry_image_2');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry2');
            $file->move($path, $filename);
            $post->industry_image_2 = $filename;
        } 
        if($request->hasFile('industry_image_3')) {
            $file = $request->file('industry_image_3');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry3');
            $file->move($path, $filename);
            $post->industry_image_3 = $filename;
        } 
        if($request->hasFile('industry_image_4')) {
            $file = $request->file('industry_image_4');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry4');
            $file->move($path, $filename);
            $post->industry_image_4 = $filename;
        }
       
        if ($request->hasFile('detail_images')) {
            $files = $request->file('detail_images');
            $newAlts = $request->input('new_detail_images_alt') ?? [];
            $imagePaths = [];
            $altsMap = [];
            foreach ($files as $index => $file) {
                $filename =  $file->getClientOriginalName();
                $path = public_path('/subproduct_detail_files');
                $file->move($path, $filename);
                $imagePaths[] =   $filename;
                $altsMap[$filename] = isset($newAlts[$index]) ? $newAlts[$index] : '';
            }
            $post->detail_images = json_encode($imagePaths);
            $post->detail_images_alt = json_encode($altsMap);
        }
       

        $post->save();
        return redirect('/admin/subproduct')->with('success', 'sub product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SubProduct::find($id);
        $categories = Category::wherenull('deleted_at')->get();
        $subcategories = Subcategory::where('category_id', $data->category_id)->get();
        $products = Product::where('subcategory_id', $data->subcategory_id)->get();
        return view('admin.subproduct.editsubproduct', compact('data', 'categories', 'subcategories','products'));
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
         $post = SubProduct::find($id);
     
        $post->title = $request->get('title');
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->product_id = $request->get('product_id');
        $post->url = $request->get('url');
        $post->short_description = $request->get('short_description');
        $post->top_title = $request->get('top_title');
        $post->description = $request->get('description');
        $post->product_description = $request->get('product_description');
        $post->datasheet_title = $request->get('datasheet_title');
        $post->datasheet_description = $request->get('datasheet_description');
        $post->industry_title_1 = $request->get('industry_title_1');
        $post->industry_description_1 = $request->get('industry_description_1');
        $post->industry_title_2 = $request->get('industry_title_2');
        $post->industry_description_2 = $request->get('industry_description_2');
        $post->industry_title_3 = $request->get('industry_title_3');
        $post->industry_description_3 = $request->get('industry_description_3');
        $post->industry_title_4 = $request->get('industry_title_4');
        $post->industry_description_4 = $request->get('industry_description_4');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->front_image_alt = $request->get('front_image_alt');
        $post->faqs = $this->makeFaqList($request);
     
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_front_image');
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
        
        if($request->hasFile('industry_image_1')) {
            $file = $request->file('industry_image_1');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry1');
            $file->move($path, $filename);
            $post->industry_image_1 = $filename;
        } 
        if($request->hasFile('industry_image_2')) {
            $file = $request->file('industry_image_2');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry2');
            $file->move($path, $filename);
            $post->industry_image_2 = $filename;
        } 
        if($request->hasFile('industry_image_3')) {
            $file = $request->file('industry_image_3');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry3');
            $file->move($path, $filename);
            $post->industry_image_3 = $filename;
        } 
        if($request->hasFile('industry_image_4')) {
            $file = $request->file('industry_image_4');
            $filename = $file->getClientOriginalName();
            $path = public_path('/subproduct_industry_image/industry4');
            $file->move($path, $filename);
            $post->industry_image_4 = $filename;
        } 

         // Handle alts
         $altsMap = json_decode($post->detail_images_alt, true) ?? [];
         
         $existingAlts = $request->input('existing_detail_images_alt') ?? [];
         foreach ($existingAlts as $filename => $altText) {
             $altsMap[$filename] = $altText ?? '';
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
                 $imagePath = public_path('subproduct_detail_files/' . $image);
                 if (file_exists($imagePath)) {
                     unlink($imagePath); 
                 }
                 if (isset($altsMap[$image])) {
                     unset($altsMap[$image]);
                 }
             }
     
             $currentImages = array_filter($currentImages, fn($image) => !in_array(basename($image), $deletedImages));
             $post->detail_images = json_encode(array_values($currentImages)); 
         }
     
         if ($request->hasFile('detail_images')) {
             $files = $request->file('detail_images');
             $newAlts = $request->input('new_detail_images_alt') ?? [];
             $imagePaths = json_decode($post->detail_images, true) ?? [];
             foreach ($files as $index => $file) {
                 $filename = $file->getClientOriginalName();
                 $path = public_path('/subproduct_detail_files');
                 $file->move($path, $filename);
                 $imagePaths[] =  $filename;
                 $altsMap[$filename] = isset($newAlts[$index]) ? $newAlts[$index] : '';
             }
             $post->detail_images = json_encode($imagePaths);
         }
         
         $post->detail_images_alt = json_encode($altsMap);
     
         $post->save();
     
         return redirect('/admin/subproduct')->with('success', 'Sub Product updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = SubProduct::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your sub product Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'sub product not found!');
       
    }


}
