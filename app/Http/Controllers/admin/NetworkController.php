<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Network;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function index()
    {
        $data = Network::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.network.networklisting', compact('data'));
    }

    public function create()
    {
        return view('admin.network.addnetwork');
    }

    public function store(Request $request)
    {
        

        $post = new Network;
        $post->title = $request->get('title');
        $post->alt = $request->get('alt');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/network_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/network')->with('success', 'Network Added Successfully');
    }

    public function edit($id)
    {
        $data = Network::find($id);
        return view('admin.network.editnetwork', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Network::find($id);
        $post->title = $request->get('title');
        $post->alt = $request->get('alt');
     
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/network_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/network')->with('success', 'Network Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Network::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Network Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Network not found!');
    }
}