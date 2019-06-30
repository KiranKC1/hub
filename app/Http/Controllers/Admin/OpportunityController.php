<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opportunity;
use Image;
use Carbon\Carbon;
use App\Opportunitiescategory;

class OpportunityController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }
    public function index()
    {
        $categories=Opportunitiescategory::all();
        $today=Carbon::now();
        $oppo=Opportunity::all();
        $oppo=Opportunity::where('date','>=',$today->format('Y-m-d'))->join('opportunitiescategories','opportunities.category_id','opportunitiescategories.id')->select('opportunities.*','opportunitiescategories.name')->orderBy('date','asc')->paginate(10,['*'],'opportunities');
        $expiredoppo=Opportunity::where('date','<=',$today->format('Y-m-d'))->join('opportunitiescategories','opportunities.category_id','opportunitiescategories.id')->select('opportunities.*','opportunitiescategories.name')->orderBy('date','asc')->paginate(10,['*'],'expired-opportunities');
        return view('admin.opportunities.index')->with('oppo',$oppo)->with('categories',$categories)->with('expiredoppo',$expiredoppo);
    }

    public function store(Request $request)
    {
         $this->validate($request, array(
                       'title'=>'required|max:255',
                       'description'=>'required',
                       'category'=>'required',
                       'featured_image'=>'required|mimes:jpeg,jpg,png,gif,svg|max:10000',
                       'date'=>'required|date',
                       'organization'=>'required|max:255',
                       'oppo_tag'=>'sometimes', 
                       'number'=>'numeric:min:7',
                       'location'=>'max:255',
                       'email'=>'email | sometimes',
                       'link'=>'max:255'
        ));
        $oppo= new Opportunity;
        $oppo->title=$request->title;
        $oppo->description=$request->description;
        $oppo->date=$request->date;
        $oppo->organization=$request->organization;
        $oppo->category_id=$request->category;
        $oppo->location=$request->location;
        $oppo->contact_details=$request->number;
        $oppo->email=$request->email;
        $oppo->link=$request->link;
        if($request->hasFile('featured_image')){
             $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/opportunities-images/'.$filename);
             Image::make($file)->resize(800, 553)->save($path);
             $oppo->featured_image = $filename;
         }
        $oppo->save();
        $tags=explode(',',$request->oppo_tag);
        $oppo->tag($tags);
        $request->session()->flash('success', 'Opportnity Detail was added');
        return redirect('admin/opportunities');
    }
    public function edit($id)
    {
        $oppo=Opportunity::find($id);
        $categories=Opportunitiescategory::all();
        return view('admin.opportunities.edit')->with('oppo',$oppo)->with('categories',$categories);
    }

    public function update(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'description'=>'required',
            'category'=>'required',
            'featured_image'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'date'=>'required|date',
            'organization'=>'required|max:255',
            'oppo_tag'=>'sometimes',
            'number'=>'numeric:min:7',
            'location'=>'max:255',
            'email'=>'email | sometimes',
            'link'=>'max:255'
        ));
        $oppo=Opportunity::find($request->id);
        $oppo->title=$request->title;
        $oppo->description=$request->description;
        $oppo->date=$request->date;
        $oppo->organization=$request->organization;
        $oppo->category_id=$request->category;
        $oppo->location=$request->location;
        $oppo->contact_details=$request->number;
        $oppo->email=$request->email;
        $oppo->link=$request->link;
        if($request->hasFile('featured_image')){
             $file = $request->file('featured_image');
             $filename = time().rand(111,999). '.' . $file->getClientOriginalExtension();
             $path = public_path('hub-images/opportunities-images/'.$filename);
             Image::make($file)->resize(800, 553)->save($path);
             $oppo->featured_image = $filename;
         }
        $oppo->save();
        $tags=explode(',',$request->oppo_tag);
        $oppo->retag($tags);
        $request->session()->flash('success', 'Opportnity Detail was saved succesfully!');
        return redirect('admin/opportunities');
    }

    public function destroy(Request $request)
    {
        $oppo=Opportunity::findorFail($request->id);
        unlink('hub-images/opportunities-images/'.$oppo->featured_image);
        $oppo->delete();
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $categories=Opportunitiescategory::all();
        $oppo=Opportunity::where('title','like','%'.$search.'%')->join('opportunitiescategories','opportunities.category_id','opportunitiescategories.id')->select('opportunities.*','opportunitiescategories.name')->orderBy('id','desc')->paginate(10);
        return view('admin.opportunities.search')->with('oppo',$oppo)->with('categories',$categories)->with('search',$search);
    }

    public function view($id)
    {
        $oppo=Opportunity::findorFail($id);
        $catid=$oppo->category_id;
        $category=Opportunitiescategory::findorFail($catid);
        return view('admin.opportunities.view')->with('oppo',$oppo)->with('category',$category);
    }
}
