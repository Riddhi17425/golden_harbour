<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomePageBanner extends Controller
{
    public function index()
    {
        $data = HomeBanner::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.homepage_banner.bannerlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.homepage_banner.addbanner');
    }

    public function store(Request $request)
    {
        $post = new HomeBanner;
        $post->Heading = $request->get('heading');
        $post->subheading = $request->get('subheading');
        $post->description = $request->get('description');
        $post->cta_title = $request->get('cta_title');
        $post->cta_url = $request->get('cta_url');
        $post->alt = $request->get('alt');

        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_banner');
            $file->move($path, $filename);
            $post->banner_image = $filename;
        }
        $post->save();

        return redirect('/admin/homepagebanner')->with('success', 'Banner Added Successfully');
    }

    public function edit($id)
    {
        $data = HomeBanner::find($id);
        return view('admin.homepage_banner.editbanner', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = HomeBanner::find($id);
        $post->Heading = $request->get('heading');
        $post->subheading = $request->get('subheading');
        $post->description = $request->get('description');
        $post->cta_title = $request->get('cta_title');
        $post->cta_url = $request->get('cta_url');
        $post->alt = $request->get('alt');

        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_banner');
            $file->move($path, $filename);
            $post->banner_image = $filename;
        }

        $post->save();
        return redirect('/admin/homepagebanner')->with('success', 'Banner Updated Successfully');
    }

    public function destroy($id)
    {
        $data = HomeBanner::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Banner Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'banner not found!');
    }
}