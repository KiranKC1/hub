<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Event;
use App\Post;
use App\Opportunity;
use Carbon\Carbon;
use App\Opportunitiescategory;
use Cviebrock\EloquentTaggable\Taggable;
use \Cviebrock\EloquentTaggable\Models\Tag as Tag;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Savedarticle;
use App\Savedopportunity;
use App\Savedevent;
use App\Like;
use Session;
use App\User;

class HomeController extends Controller
{
   
    protected $posts_per_page=10;
    protected $events_per_page=5;
    protected $opportunties_per_page=12;

    public function index(Request $request)
    {
        $featuredposts=Post::where('featured','=',true)->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('created_at','desc')->get();
        $posts=Post::join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('created_at','desc')->paginate($this->posts_per_page);
        $users=User::all();
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());

        }
        $allposts=Post::all();
        $categories=Category::all();
        $countposts=count($allposts);
        if(Auth::User())
        {
            if($request->ajax()) {
            return [
                'posts' => view('frontend.ajax.home')->with('posts',$posts)->with('saves',$saves)->with('likes',$likes)->with('categories',$categories)->with('users',$users)->render(),
                'next_page' => $posts->nextPageUrl()
                ];
            }
        }
        else{
            if($request->ajax()) {
                return [
                    'posts' => view('frontend.ajax.home')->with('users',$users)->with('posts',$posts)->with('catgories',$categories)->render(),
                    'next_page' => $posts->nextPageUrl()
                    ];
                }
        }
        $today=Carbon::now();
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(5);
        $opportunities=Opportunity::where('date','>=',$today->format('Y-m-d'))->orderBy('date','asc')->paginate(5);
        $categories=Category::all();
        if(Auth::User())
        {
        return view('frontend.home')->with('posts',$posts)->with('events',$events)->with('categories',$categories)->with('opportunities',$opportunities)->with('countposts',$countposts)->with('saves',$saves)->with('likes',$likes)->with('users',$users)->with('featuredposts',$featuredposts);
        }
        else{
            return view('frontend.home')->with('posts',$posts)->with('events',$events)->with('categories',$categories)->with('opportunities',$opportunities)->with('countposts',$countposts)->with('users',$users)->with('featuredposts',$featuredposts);
        }
    }

    public function HomeCategory(Request $request,$slug)
    {
        $category=Category::where('slug','=',$slug)->first();
        if($category == null)
        {
            return redirect()->route('home');
        }
        $featuredposts=Post::where('featured','=',true)->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('created_at','desc')->get();
        $posts=Post::join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->where('category_id','=',$category->id)->orderBy('created_at','desc')->paginate($this->posts_per_page);
        $users=User::all();
        $postscount=Post::where('category_id','=',$category->id)->get();
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());
        }
        $allposts=Post::all();
        $categories=Category::all();
        $countposts=count($posts);
        if(Auth::User())
        {
            if($request->ajax()) {
            return [
                'posts' => view('frontend.ajax.home')->with('posts',$posts)->with('saves',$saves)->with('likes',$likes)->with('categories',$categories)->with('users',$users)->render(),
                'next_page' => $posts->nextPageUrl()
                ];
            }
        }
        else{
            if($request->ajax()) {
                return [
                    'posts' => view('frontend.ajax.home')->with('users',$users)->with('posts',$posts)->with('categories',$categories)->render(),
                    'next_page' => $posts->nextPageUrl()
                    ];
                }
        }
        $today=Carbon::now();
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(5);
        $opportunities=Opportunity::where('date','>=',$today->format('Y-m-d'))->orderBy('date','asc')->paginate(5);
        $categories=Category::all();
        if(Auth::User())
        {
        return view('frontend.home')->with('posts',$posts)->with('events',$events)->with('categories',$categories)->with('opportunities',$opportunities)->with('countposts',$countposts)->with('saves',$saves)->with('likes',$likes)->with('users',$users)->with('featuredposts',$featuredposts);
        }
        else{
            return view('frontend.home')->with('posts',$posts)->with('events',$events)->with('categories',$categories)->with('opportunities',$opportunities)->with('countposts',$countposts)->with('users',$users)->with('featuredposts',$featuredposts);
        }
    }

    public function singlepost($slug)
    {
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());

        }
        $p=Post::where('slug','=',$slug)->first();
        $posts=Post::where('slug','=',$slug)->first();
        $relatedposts=Post::where('category_id','=',$posts->category_id)->orderBy('id','desc')->paginate(6);
        $categories = Category::all();
        if(Auth::User()){
            return view('frontend.singlepost')->with('posts',$posts)->with('relatedposts',$relatedposts)->with('relatedposts',$relatedposts)->with('categories',$categories)->with('saves',$saves)->with('likes',$likes);
        }
        else{
            return view('frontend.singlepost')->with('posts',$posts)->with('relatedposts',$relatedposts)->with('relatedposts',$relatedposts)->with('categories',$categories);
        }
    }

    public function events(Request $request)
    {
        $today=Carbon::now();
        $category=Category::all();
        $posts=Post::orderBy('created_at','desc')->get()->take(5);
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate($this->events_per_page);
        if($request->ajax()){
            return [
                'events' => view('frontend.ajax.events')->with('events',$events)->render(),
                'next_page' => $events->nextPageUrl()
            ];
        }
        $allevents=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->get();
        return view('frontend.events')->with('posts',$posts)->with('events',$events)->with('allevents',$allevents)->with('category',$category);
    }

    public function singleevents($slug)
    {
        if(Auth::User())
        {
            $savedevents = Savedevent::select('event_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedevents->toArray());
        }
        $today=Carbon::now();
        $event=Event::where('slug','=',$slug)->first();
        $upcomingevents=Event::where('event_date','>=',$today->format('Y-m-d'))->where('slug','!=',$event->slug)->orderBy('event_date','asc')->paginate(5);
        if(Auth::User())
        {
            return view('frontend.singleevent')->with('event',$event)->with('upcomingevents',$upcomingevents)->with('saves',$saves);
        }
        return view('frontend.singleevent')->with('event',$event)->with('upcomingevents',$upcomingevents);
    }

    public function opportunities(Request $request)
    {
        $today=Carbon::now();
        $categories=Opportunitiescategory::all();
        $countoppo=Opportunity::all();
        $counto=count($countoppo);
        $opportunities=Opportunity::where('date','>=',$today->format('Y-m-d'))->orderBy('id','asc')->paginate($this->opportunties_per_page);
            if($request->ajax()){
                return [
                    'opportunities' => view('frontend.ajax.opportunities')->with('opportunities',$opportunities)->render(),
                    'next_page' => $opportunities->nextPageUrl()
                ];
            }
        return view('frontend.opportunities')->with('opportunities',$opportunities)->with('counto',$counto)->with('categories',$categories);
    }
    public function singleopportunities($slug)
    {
        if(Auth::User())
        {
            $savedjobs = Savedopportunity::select('opportunity_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedjobs->toArray());
        }
        $os=Opportunity::where('slug','=',$slug)->first();
        $category=$os->category_id;
        $sos=opportunity::where('category_id','=',$category)->where('slug','!=',$os->slug)->get();
        $end = Carbon::parse($os->date);
        $now = Carbon::now();
        $deadline = $end->diffInDays($now);
        if(Auth::User())
        {
            return view('frontend.singleopportunities')->with('os',$os)->with('deadline',$deadline)->with('sos',$sos)->with('saves',$saves);
        }
        return view('frontend.singleopportunities')->with('os',$os)->with('deadline',$deadline)->with('sos',$sos);
    }

    public function SortOpportunities(Request $request,$slug)
    {
        $today=Carbon::now();
        $categories=Opportunitiescategory::all();
        $category=Opportunitiescategory::where('slug','=',$slug)->first();
        $opportunities=Opportunity::where('category_id','=',$category->id)->where('date','>=',$today->format('Y-m-d'))->orderBy('id','asc')->paginate($this->opportunties_per_page);
        $counto=count($opportunities);
        if($request->ajax()){
            return [
                'opportunities' => view('frontend.ajax.opportunities')->with('opportunities',$opportunities)->render(),
                'next_page' => $opportunities->nextPageUrl()
            ];
        }
        return view('frontend.sortopportunities')->with('opportunities',$opportunities)->with('counto',$counto)->with('categories',$categories)->with('category',$category);
    }

    public function PostTags(Request $request,$tag)
    {
        $posts=$this->paginate(Tag::findByName($tag)->posts, $perPage = 5, $page = null, $options = []);
        $po=Tag::findByName($tag)->posts;
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());

        }
        $countposts=count($po);
        $today=Carbon::now();
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(5);
        $users=User::all();
        $opportunities=Opportunity::where('date','>=',$today->format('Y-m-d'))->orderBy('date','asc')->paginate(5);
        $categories=Category::all();
        $tags = Tag::paginate(20);
        if(Auth::User()){
            if($request->ajax()) {
                $posts=$this->paginate(Tag::findByName($tag)->posts, $perPage = 5, $page = null, $options = []);
            
                return [
                    'posts' => view('frontend.ajax.tagposts')->with('posts',$posts)->with('saves',$saves)->with('likes',$likes)->with('categories',$categories)->with('users',$users)->render(),
                    
                    'next_page' => $posts->nextPageUrl()
                ];
            }
        }
        else{
            if($request->ajax()) {
                $posts=$this->paginate(Tag::findByName($tag)->posts, $perPage = 5, $page = null, $options = []);
                return [
                    'posts' => view('frontend.ajax.tagposts')->with('posts',$posts)->with('users',$users)->with('categories',$categories)->render(),
                    'next_page' => $posts->nextPageUrl()
                ];
            }
        }
      
        if(Auth::User()){
            return view('frontend.tagposts')->with('posts',$posts)->with('countposts',$countposts)->with('events',$events)->with('opportunities',$opportunities)->with('categories',$categories)->with('tag',$tag)->with('tags',$tags)->with('likes',$likes)->with('saves',$saves)->with('users',$users);            
        }
        else{
            return view('frontend.tagposts')->with('posts',$posts)->with('countposts',$countposts)->with('events',$events)->with('opportunities',$opportunities)->with('categories',$categories)->with('tag',$tag)->with('tags',$tags)->with('users',$users);
        }
    }

    public function OpportunitiesTags($tag)
    {
        
        $op=Tag::findByName($tag)->opportunities;
        dd($op);
    }

    public function EventsTags(Request $request,$tag)
    {
        $events=$this->paginate(Tag::findByName($tag)->events, $perPage = 5, $page = null, $options = []);
        $today=Carbon::now();
        $posts=Post::orderBy('created_at','desc')->get()->take(5);
        if($request->ajax()){
            return [
                'events' => view('frontend.ajax.events')->with('events',$events)->render(),
                'next_page' => $events->nextPageUrl()
            ];
        }
        $allevents = Tag::findByName($tag)->events;
        return view('frontend.tagsevents')->with('posts',$posts)->with('events',$events)->with('allevents',$allevents)->with('tag',$tag);
    }

    public function SortPosts(Request $request,$slug)
    {
        $category=Category::where('slug','=',$slug)->first();
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());

        }
        $posts=Post::where('category_id','=',$category->id)->orderBy('created_at','desc')->paginate($this->posts_per_page);
        $postscount=Post::where('category_id','=',$category->id)->get();
        $countposts=count($postscount);
        $users=User::all();
        if(Auth::User())
        {
            if($request->ajax()) {
            return [
                'posts' => view('frontend.ajax.home')->with('posts',$posts)->with('saves',$saves)->with('likes',$likes)->with('users',$users)->render(),
                'next_page' => $posts->nextPageUrl()
                ];
            }
        }
        else{
            if($request->ajax()) {
                return [
                    'posts' => view('frontend.ajax.home')->with('posts',$posts)->with('users',$users)->render(),
                    'next_page' => $posts->nextPageUrl()
                    ];
                }
        }
        $today=Carbon::now();
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(5);
        $opportunities=Opportunity::where('date','>=',$today->format('Y-m-d'))->orderBy('date','asc')->paginate(5);
        $categories=Category::all();
        if(Auth::User()){
            return view('frontend.sortposts')->with('posts',$posts)->with('categories',$categories)->with('countposts',$countposts)->with('events',$events)->with('opportunities',$opportunities)->with('likes',$likes)->with('category',$category)->with('saves',$saves)->with('users',$users);
        }
        else{
            return view('frontend.sortposts')->with('posts',$posts)->with('categories',$categories)->with('countposts',$countposts)->with('events',$events)->with('opportunities',$opportunities)->with('category',$category)->with('users',$users);
        }
    }

    public function search(Request $request)
    {
        $this->validate($request, array(
            'search'=>'required|max:255',
        ));
        if(Auth::User())
        {
            $savedarticles = Savedarticle::select('article_id')->where('user_id',Auth::user()->id)->get();
            $saves=array_flatten($savedarticles->toArray());
            $likedarticles= Like::select('article_id')->where('user_id',Auth::user()->id)->get();
            $likes=array_flatten($likedarticles->toArray());

        }
      
            $queryString = $request->search;
            $query=$queryString;
            $users_all=User::all();
            $posts = Post::where('title', 'LIKE', "%$queryString%")->join('categories','posts.category_id','categories.id')->select('posts.*','categories.name')->orderBy('name')->paginate(10,['*'],'posts');
            $users = User::where('name','LIKE',"%$queryString%")->orderBy('name')->paginate(12,['*'],'users');
            $events = Event::where('title','LIKE',"%$queryString%")->orderBy('title')->paginate(5,['*'],'events');
            $opportunities = Opportunity::where('title','LIKE',"%$queryString%")->orderBy('title')->paginate(12,['*'],'opportunities');
            $countresults=count($posts)+count($users)+count($events)+count($opportunities);
            if(Auth::User())
            {
                return view('frontend.search')->with('posts',$posts)->with('users',$users)->with('events',$events)->with('opportunities',$opportunities)->with('likes',$likes)->with('saves',$saves)->with('query',$query)->with('countresults',$countresults)->with('users_all',$users_all);
            }
            else{
                return view('frontend.search')->with('posts',$posts)->with('users',$users)->with('events',$events)->with('opportunities',$opportunities)->with('query',$query)->with('countresults',$countresults)->with('users_all',$users_all);
            }
        
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
	$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
	$items = $items instanceof Collection ? $items : Collection::make($items);
	return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
