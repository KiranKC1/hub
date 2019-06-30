<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Image;
use Session;
use Cviebrock\EloquentTaggable\Models\Tag;

class PostsController extends Controller
{
    
    
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }
    
    public function index()
    {
        $categories=Category::all();
        $posts=Post::join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('id','desc')->paginate(10);
        return view('admin.posts.index')->with('categories',$categories)->with('posts',$posts);
    }

    public function store(Request $request)
    { 
        $this->validate($request, array(
                       'title'=>'required|max:255',
                       'description'=>'required',
                       'featured_image'=>'sometimes|nullable|mimes:jpeg,jpg,png,gif,svg|max:10000',
                       'category'=>'required',
                       'author'=>'required|max:255',
        ));
        $posts= new Post;
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->author=$request->author;
        $posts->category_id=$request->category;
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/posts-images/'.$filename);
             Image::make($file)->resize(750, 500)->save($path);
             $posts->featured_image = $filename;
         }
        $posts->save();
        if($request->post_tag !=null){
            $tags=explode(',',$request->post_tag);
            $posts->tag($tags);
        }
        $request->session()->flash('success', 'New Post was added');
        return redirect('admin/posts');
    }
    public function edit($id)
    {
        $posts=Post::find($id);
        $categories=Category::all();
        return view('admin.posts.edit')->with('posts',$posts)->with('categories',$categories);
    }
    public function update(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'description'=>'required',
            'featured_image'=>'sometimes|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'category'=>'required',
            'author'=>'required|max:255',
        ));
        $posts=Post::find($request->id);
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->author=$request->author;
        $posts->category_id=$request->category;
        if($request->hasFile('featured_image')){
            unlink('hub-images/posts-images/'.$posts->featured_image);
            $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/posts-images/'.$filename);
             Image::make($file)->resize(750, 500)->save($path);
             $posts->featured_image = $filename;
         }
        $posts->save();
        if($request->post_tag != null){
            $tags=explode(',',$request->post_tag);
            $posts->detag();
            $posts->retag($tags);
        }
        $request->session()->flash('success', 'Post was edited Successfully!');
        return redirect('admin/posts');
    }

    public function destroy(Request $request)
    {
        $posts=Post::findorFail($request->id);
        // dd($posts);
        // unlink('hub-images/posts-images/'.$posts->featured_image);
        $posts->delete();
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $categories=Category::all();
        $posts=Post::where('title','like','%'.$search.'%')->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('id','desc')->paginate(10);
        return view('admin.posts.search')->with('posts',$posts)->with('categories',$categories)->with('search',$search);
    }

    public function view($id)
    {
        $post=Post::findorFail($id);
        $catid=$post->category_id;
        $category=Category::findorFail($catid);
        return view('admin.posts.view')->with('post',$post)->with('category',$category);
    }

    public function FeatureArticle(Request $request)
    {
        $id=$request->post_id;
        $post=Post::findorFail($id);
        if($post->featured == true)
        {
            $post->featured=false;
            $post->save();
            return "unfeatured";
        }
        else{
            $post->featured=true;
            $post->save();
            return "featured";
        }
    }

}

