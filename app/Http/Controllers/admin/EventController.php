<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.event.eventlisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.addevent');
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
        $validatedData = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'event_type' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
        ], [
            'title.required' => 'Please enter the event name.',
            'short_description.required' => 'Please enter the event short description.',
            'event_type.required' => 'Please enter the event type.',
            'event_start_date.required' => 'Please enter the event start date.',
            'event_end_date.required' => 'Please enter the event end date.',
        ]);

        $post = new Event;

        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->event_type = $request->get('event_type');
        $post->description = $request->get('description');
        $post->address = $request->get('address');
        $post->event_start_date = date('Y-m-d', strtotime($request->input('event_start_date')));
        $post->event_end_date = date('Y-m-d', strtotime($request->input('event_end_date')));
       
        if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/event_home_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }
       
        if ($request->hasFile('multiple_images')) {
            $files = $request->file('multiple_images');
            $imagePaths = [];
            foreach ($files as $file) {
                $filename =  $file->getClientOriginalName();
                $path = public_path('/event_cat_files');
                $file->move($path, $filename);
                $imagePaths[] =   $filename;
            }
            if(!empty($imagePaths)) {
                $post->multiple_images = json_encode($imagePaths);
            }
        }
       

        $post->save();
        return redirect('/admin/event')->with('success', 'event Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::find($id);
        return view('admin.event.editevent', compact('data'));
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
         $post = Event::find($id);
     
         $post->title = $request->get('title');
         $post->short_description = $request->get('short_description');
         $post->event_type = $request->get('event_type');
         $post->description = $request->get('description');
         $post->address = $request->get('address');
         $post->event_start_date = date('Y-m-d', strtotime($request->input('event_start_date')));
         $post->event_end_date = date('Y-m-d', strtotime($request->input('event_end_date')));
     
         if($request->hasFile('home_image')) {
            $file = $request->file('home_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/event_home_image');
            $file->move($path, $filename);
            $post->home_image = $filename;
        }

         //remove image name 
         $deletedImages = $request->input('deleted_images');
         if ($deletedImages) {
             $deletedImages = json_decode($deletedImages, true) ?? [];
         } else {
             $deletedImages = []; 
         }
     
         if (!empty($deletedImages)) {
             $currentImages = json_decode($post->multiple_images, true) ?? [];
     
             foreach ($deletedImages as $image) {
                 $imagePath = public_path('event_cat_files/' . $image);
                 if (file_exists($imagePath)) {
                     unlink($imagePath); 
                 }
             }
     
             $currentImages = array_filter($currentImages, fn($image) => !in_array(basename($image), $deletedImages));
             $post->multiple_images = json_encode(array_values($currentImages)); 
         }
     
         if ($request->hasFile('multiple_images')) {
             $files = $request->file('multiple_images');
             $imagePaths = json_decode($post->multiple_images, true) ?? [];
             foreach ($files as $file) {
                 $filename = $file->getClientOriginalName();
                 $path = public_path('/event_cat_files');
                 $file->move($path, $filename);
                 $imagePaths[] =  $filename;
             }
             $post->multiple_images = json_encode($imagePaths);
         }
     
         $post->save();
     
         return redirect('/admin/event')->with('success', 'Event updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = Event::find($id);
       if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your event Has Been Deleted Successfully!');
      }
        return redirect()->back()->with('error', 'event not found!');
       
    }


}