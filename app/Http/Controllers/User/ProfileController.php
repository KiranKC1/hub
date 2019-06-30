<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Post;
use App\Savedarticle;
use App\User;
use App\Savedopportunity;
use App\Savedevent;
use App\Opportunity;
use App\Like;
use App\Category;
use \Cviebrock\EloquentTaggable\Models\Tag as Tag;
use Image;
use Session;
use App\UserPost;
use App\Notifications\LikedPost;
use DB;
use App\Account;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'UsersProfile']);
        
    }

    public function profile()
    {
        $recentop=Opportunity::orderBy('created_at','desc')->paginate(5);
        $posts=User::findOrFail(Auth::User()->id)->posts()->get();
        $recentposts=Post::orderBy('created_at','desc')->paginate(6);
        $unverified=UserPost::where('user_id','=',Auth::User()->id)->where('verified','=',false)->get();
        $category=Category::all();
        $verified=Post::where('user_id','=',Auth::User()->id)->get();
        $opportunities=User::findorFail(Auth::User()->id)->opportunities()->get();
        $events=User::findorFail(Auth::User()->id)->events()->get();
        $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
        $saves=array_flatten($savedarticles->toArray());
        $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
        $likes=array_flatten($likedarticles->toArray());
        $users=User::all();
        return view('frontend.profile')->with('posts',$posts)->with('opportunities',$opportunities)->with('events',$events)->with('recentposts',$recentposts)->with('recentop',$recentop)->with('unverified',$unverified)->with('verified',$verified)->with('saves',$saves)->with('likes',$likes)->with('category',$category)->with('users',$users);
    }

    public function SaveArticle(Request $request)
    {
        $savecheck=Savedarticle::where(['user_id'=>Auth::id(),'article_id'=>$request->post_id])->first();
        if($savecheck)
        {
            Savedarticle::where(['user_id'=>Auth::id(),'article_id'=>$request->post_id])->delete();
            return 'success';
        }
        else{
            $article= new Savedarticle;
            $article->user_id= Auth::id();
            $article->article_id=$request->post_id;
            $article->save();
            return 'success';
        }

    }

    
    public function LikeArticle(Request $request)
    {
    
        $savecheck=Like::where(['user_id'=>Auth::id(),'article_id'=>$request->post_id])->first();
        $post=Post::where('id','=',$request->post_id)->first();
        $article_author=User::where('id','=',$post->user_id)->first();
        $user=Auth::User();
        if($savecheck)
        {
            Like::where(['user_id'=>Auth::id(),'article_id'=>$request->post_id])->delete();
            if($article_author != null){   
            foreach($article_author->notifications->where('type','=','App\Notifications\LikedPost') as $a)
            {
               if($a->data['post']['id']==$request->post_id)
               {
                   DB::table('notifications')->where('id',$a->id)->delete();
               }                        
            }
            }
            return 'success';
        }
        else{
            $article= new Like;
            $article->user_id= Auth::id();
            $article->article_id=$request->post_id;
            $article->save();
            if($post->user_id != null && Auth::User()->id != $post->user_id )
            {
                $article_author->notify(new LikedPost($post,$user,$article));
            }
            return 'success';
        }
    }
    
    public function SaveJob(Request $request)
    {
        $savecheck=Savedopportunity::where(['user_id'=>Auth::id(),'opportunity_id'=>$request->id])->first();
        if($savecheck)
        {
            Savedopportunity::where(['user_id'=>Auth::id(),'opportunity_id'=>$request->id])->delete();
            return 'success';
        }
        else{
            $oppo= new Savedopportunity;
            $oppo->user_id= Auth::id();
            $oppo->opportunity_id=$request->id;
            $oppo->save();
        }

    }

    public function SaveEvent(Request $request)
    {
        $savecheck=Savedevent::where(['user_id'=>Auth::id(),'event_id'=>$request->id])->first();
        if($savecheck)
        {
            Savedevent::where(['user_id'=>Auth::id(),'event_id'=>$request->id])->delete();
            return 'success';
        }
        else{
            $oppo= new Savedevent;
            $oppo->user_id= Auth::id();
            $oppo->event_id=$request->id;
            $oppo->save();
        }

    }
    

    public function EditProfile(Request $request)
    {        
        $user=User::findOrFail(Auth::User()->id);
        if($request->type =='name'){
            $request->validate([
                'name' => 'required|max:255'
            ]);
            $user->name=$request->name;
            $user->save();
        }
        elseif($request->type =='institution'){
                $request->validate([
                'institution' => 'max:255'
            ]);
            $user->institution=$request->institution;
            $user->save();
        }
        elseif($request->type =='contact'){
            $request->validate([
                'contact' => 'required|max:255'
            ]);
            $user->contact=$request->contact;
            $user->save();
        }
        elseif($request->type =='slug'){
            $request->validate([
                'slug' => 'required|max:255|unique:users'
            ]);
            $user->slug=$request->slug;
            $user->save();
        }
        elseif($request->type =='about'){
            $request->validate([
                'about' => 'required|max:255'
            ]);
            $user->about=$request->about;
            $user->save();
        }
            
 
    }
    public function ChangePicture(Request $request)
    {
        $user=User::find($request->id);
        
        if($request->hasFile('picture')){
            if($user->picture != 'users.png')
            {
                unlink('hub-images/users-images/'.$user->picture);
                $file = $request->file('picture');
                $filename = $user->id. '.' . 'jpg';
                $path = public_path('hub-images/users-images'.'/'.$filename);
                Image::make($file)->encode('jpg',75)->resize(400, 400)->save($path);
                $user->picture = $filename;
            }
            else{
                $file = $request->file('picture');
                $filename = $user->id. '.' . 'jpg';
                $path = public_path('hub-images/users-images'.'/'.$filename);
                Image::make($file)->encode('jpg',75)->resize(400, 400)->save($path);
                $user->picture = $filename;
            }
        }
        $user->save();
        Session::flash('success', 'Your picture was updated!');
        return redirect()->route('user.profile');
    }

    public function PostArticle()
    {
        $categories=Category::all();
        $tags= Post::allTagModels();
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('frontend.user-post-form')->with('categories',$categories)->with('posts',$posts)->with('tags',$tags);
    }
    public function SaveUserArticle(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'description'=>'required',
            'featured_image'=>'sometimes|nullable|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'category'=>'required',
        ));
            $posts= new UserPost;
            $posts->title=$request->title;
            $posts->description=$request->description;
            $posts->author=Auth::User()->name;
            $posts->user_id=Auth::User()->id;
            $posts->username=Auth::User()->slug;
            $posts->category_id=$request->category;
            if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
            $path = public_path('hub-images/user-posts-images/'.$filename);
            Image::make($file)->resize(750, 500)->save($path);
            $posts->featured_image = $filename;
            }
            $posts->save();
            if($request->post_tag !=null){
            $tags=$request->post_tag;
            $posts->tag($tags);
            }
            $request->session()->flash('success', 'Your Post was submitted! We will notify you once it gets verified. Thank You!');
            return redirect('user/profile#myarticles');
    }

    public function UsersProfile($slug)
    {
    
        $user=User::where('slug','=',$slug)->first();
        $users=User::all();
        $myarticles=Post::where('user_id','=',$user->id)->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('created_at','desc')->paginate(10);
        $clappedarticles=User::findOrFail($user->id)->posts()->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('created_at','desc')->paginate(10);
        if(Auth::User()){
        $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
        $saves=array_flatten($savedarticles->toArray());
        $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
        $likes=array_flatten($likedarticles->toArray());
        }
        if(Auth::User()){
            return view('frontend.usersview')->with('user',$user)->with('myarticles',$myarticles)->with('saves',$saves)->with('likes',$likes)->with('clappedarticles',$clappedarticles)->with('users',$users);
        }
        else{
            return view('frontend.usersview')->with('user',$user)->with('myarticles',$myarticles)->with('clappedarticles',$clappedarticles)->with('users',$users);
        }
       
    }

}
