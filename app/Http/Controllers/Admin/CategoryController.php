<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Event;
use App\Opportunity;
use App\Opportunitiescategory;
use Session;

class CategoryController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }
    
    public function index()
    {
        $oc=Opportunitiescategory::all();
        $c=Category::all();
        $posts=Post::all();
        $events=Event::all();
        $oppo=Opportunity::all();
        return view('admin.categories')->with('c',$c)->with('posts',$posts)->with('events',$events)->with('oppo',$oppo)->with('oc',$oc);
    }
    public function OppoCreate(Request $request)
    {
        $oppocategory = new Opportunitiescategory;
        $oppocategory->name= $request->name;
        $oppocategory->save();
        return 'done';  
    }
    public function OppoDestroy(Request $request)
    {
        $oppocategory=Opportunitiescategory::find($request->id);
        $oppocategory->delete();
    }
    public function OppoUpdate(Request $request)
    {
        
        $oppocategory=Opportunitiescategory::find($request->id);
        $oppocategory->name=$request->name;
        $oppocategory->save();
        Session::flash('success','Saved Successfully!');
    }

    public function create(Request $request)
    {
        // return 'done';
        $category = new Category;
        $category->name= $request->name;
        $category->save();
        return 'done';
    }

    public function destroy(Request $request)
    {
        $category=Category::find($request->id);
        $category->delete();
     }

     public function update(Request $request)
     {
         $category=Category::find($request->id);
         $category->name=$request->name;
         $category->save();
         Session::flash('success','Saved Successfully!');
     }

}
