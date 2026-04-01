<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
  
    public function index()
    {
        $data = Catalog::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.catalog.cataloglisting', compact('data'));
    }

        public function create()
    { 
        return view('admin.catalog.addcatalog');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ], [
            'title.required' => 'Please enter the catalog name.',
            'subtitle.required' => 'Please enter the catalog subtitle.',
        ]);

        $post = new Catalog;
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/catalog_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/catalog_pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        $post->save();

        return redirect('/admin/catalog')->with('success', 'Catalog Added Successfully');
    }

    public function edit($id)
    {
        $data = Catalog::find($id);
        return view('admin.catalog.editcatalog', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Catalog::find($id);
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/catalog_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/catalog_pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        $post->save();
        return redirect('/admin/catalog')->with('success', 'Catalog Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Catalog::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Catalog Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Catalog not found!');
    }
}