<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Event;
use App\Opportunity;
class AdminController extends Controller
{ 
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=Category::all();
        $posts=Post::all();
        $events=Event::all();
        $oppo=Opportunity::all();
        return view('admin.dashboard')->with('c',$c)->with('posts',$posts)->with('events',$events)->with('oppo',$oppo);
    }

}
