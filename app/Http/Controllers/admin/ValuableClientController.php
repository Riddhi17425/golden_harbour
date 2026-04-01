<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ValuableClient;
use Illuminate\Http\Request;

class ValuableClientController extends Controller
{
    public function index()
    {
        $data = ValuableClient::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.valuableclient.valuableclientlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.valuableclient.addvaluableclient');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'designation'=> 'required',
        ], [
            'name.required' => 'Please Enter the name.',
            'description.required'=> 'Please Enter the description.',
            'designation.required'=> 'Please Enter the designation.',
        ]);

        $post = new ValuableClient;
        $post->name = $request->get('name');
        $post->description = $request->get('description');  
        $post->designation = $request->get('designation');
        $post->alt_tag = $request->get('alt_tag');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/valuableclient_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/valuableclient')->with('success', 'Valuable Client Added Successfully');
    }

    public function edit($id)
    {
        $data = ValuableClient::find($id);
        return view('admin.valuableclient.editvaluableclient', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = ValuableClient::find($id);
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->designation = $request->get('designation');
        $post->alt_tag = $request->get('alt_tag');
     
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/valuableclient_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/valuableclient')->with('success', 'Valuable Client Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ValuableClient::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Valuable Client Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Valuable Client not found!');
    }
}