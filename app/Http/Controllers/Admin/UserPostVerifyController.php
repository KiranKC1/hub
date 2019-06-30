<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserPost;
use App\Category;
use App\Post;
use Auth;

class UserPostVerifyController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }
    
    public function UserPostList()
    {
        $unverifiedposts=UserPost::where('verified','=',false)->join('categories','users_dummy_posts.category_id','categories.id')->select('users_dummy_posts.*','categories.name')->orderBy('seen','asc')->paginate(10);;
        $verifiedposts=UserPost::where('verified','=',true)->join('categories','users_dummy_posts.category_id','categories.id')->select('users_dummy_posts.*','categories.name')->orderBy('id','desc')->paginate(10);;
        return view('admin.userposts.userpostslist')->with('verifiedposts',$verifiedposts)->with('unverifiedposts',$unverifiedposts);
    }


    public function UserPost($id)
    {
        $post=UserPost::findOrFail($id);
        $catid=$post->category_id;
        $category=Category::findorFail($catid);
        $post->seen=true;
        $post->save();
        return view('admin.userposts.userpostview')->with('post',$post)->with('category',$category);
    }

    public function EditUserPost($id)
    {
        $posts=UserPost::find($id);
        $categories=Category::all();
        return view('admin.userposts.userpostedit')->with('posts',$posts)->with('categories',$categories);

    }

    public function ApproveUserPost(Request $request)
    {
        $this->validate($request, array(
                       'title'=>'required|max:255',
                       'description'=>'required',
                       'category'=>'required',
                       'author'=>'required',
                       'user_id'=>'required',
                       'username'=>'required',
        ));
        $un=UserPost::findOrFail($request->unapproved_id);
        $posts= new Post;
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->author=$request->author;
        $posts->username=$request->username;
        $posts->category_id=$request->category;
        $posts->featured_image=$request->image_users_post;
        $posts->user_id=$request->user_id;
        if($request->image_users_post != null){
        \File::copy(base_path('public/hub-images/user-posts-images'.'/'.$request->image_users_post),base_path('public/hub-images/posts-images'.'/'.$request->image_users_post));
        }
        $un->verified=true;
        $posts->save();
        $un->save();
        if($request->post_tag !=null){
            $tags=explode(',',$request->post_tag);
            $posts->tag($tags);
        }
    
        $request->session()->flash('success', 'Post was verified and approved');
        return redirect('admin/users/posts/verify');
    }

    public function DeletePost(Request $request)
    {
            $posts=UserPost::findorFail($request->id);
            if($posts->featured_image != null)
            {
                unlink('hub-images/user-posts-images/'.$posts->featured_image);    
            }
            $posts->delete();
    }

}
