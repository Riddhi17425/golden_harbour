<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\IndustrySolution;
use App\Models\Event;
use App\Models\News;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function admin(){
        $blogCount =Blog::whereNull('deleted_at')->count();
        $productCount =IndustrySolution::whereNull('deleted_at')->count();
        $eventCount =Event::whereNull('deleted_at')->count();
        $newsCount = News::whereNull('deleted_at')->count();
        return view('admin.admin',compact('blogCount','productCount','eventCount','newsCount'));
    }
	
}