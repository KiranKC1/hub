<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Image;
use Carbon\Carbon;
use App\Category;

class EventController extends Controller
{
    
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }
    
    public function index()
    {
        $today=Carbon::now();
        $events=Event::where('event_date','>=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(10,['*'],'events');
        $pastevents=Event::where('event_date','<=',$today->format('Y-m-d'))->orderBy('event_date','asc')->paginate(10,['*'],'pastevents');
        $categories=Category::all();
        return view('admin.events.index')->with('events',$events)->with('pastevents',$pastevents);
    }

    public function store(Request $request)
    {
         $this->validate($request, array(
                       'title'=>'required|max:255',
                       'description'=>'required',
                       'featured_image'=>'sometimes|nullable|mimes:jpeg,jpg,png,gif,svg|max:10000',
                       'start_time'=>'required|date_format:H:i', 
                       'end_time'=>'required|date_format:H:i', 
                       'event_date'=>'required|date',
                       'venue'=>'required|max:255',
                       'event_tag'=>'sometimes', 
        ));
        $events= new Event;
        $events->title=$request->title;
        $events->description=$request->description;
        $events->start_time=$request->start_time;
        $events->end_time=$request->end_time;
        $events->event_date=$request->event_date;
        $events->venue=$request->venue;
        if($request->hasFile('featured_image')){
             $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/events-images/'.$filename);
             Image::make($file)->resize(800, 553)->save($path);
             $events->featured_image = $filename;
         }
        $events->save();
        $tags=explode(',',$request->event_tag);
        $events->tag($tags);
        $request->session()->flash('success', 'New Event was added');
        return redirect('admin/events');
    }

    public function edit($id)
    {
        $events=Event::find($id);
        return view('admin.events.edit')->with('events',$events);
    }

    public function update(Request $request)
    {
        $this->validate($request, array(
                       'title'=>'required|max:255',
                       'description'=>'required',
                       'featured_image'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
                       'start_time'=>'required|date_format:H:i',
                       'end_time'=>'required|date_format:H:i',
                       'event_date'=>'required|date',
                       'venue'=>'required|max:255',
                       'event_tag'=>'sometimes', 
        ));
        $events=Event::find($request->id);
        $events->title=$request->title;
        $events->description=$request->description;
        $events->start_time=$request->start_time;
        $events->end_time=$request->end_time;
        $events->event_date=$request->event_date;
        $events->venue=$request->venue;
        if($request->hasFile('featured_image')){
             $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/events-images/'.$filename);
             Image::make($file)->resize(800, 553)->save($path);
             $events->featured_image = $filename;
         }
        $events->save();
        $tags=explode(',',$request->event_tag);
        $events->retag($tags);
        $request->session()->flash('success', 'Event Saved Successfully!');
        return redirect('admin/events');
    }

    public function destroy(Request $request)
    {
        $events=Event::findorFail($request->id);
        unlink('hub-images/events-images/'.$events->featured_image);
        $events->delete();
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $categories=Category::all();
        $events=Event::where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(10);
        return view('admin.events.search')->with('events',$events)->with('search',$search);
    }

    public function view($id)
    {
        $events=Event::findorFail($id);
        return view('admin.events.view')->with('events',$events);
    }
}
