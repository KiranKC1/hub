<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Auth;

class TestimonialController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function index()
    {
        $testimonials = Testimonial::all()->sortByDesc('updated_at');
        $testimonial = new Testimonial;
        return view('admin.testimonials')->with('testimonial_',$testimonial)->with('testimonials',$testimonials)->with('state','Add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'=>'mimes:jpeg,bmp,png',            
            'content' => 'required',
            'name' => 'required',
            'profession' => 'required'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->content = $request->content;
                
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('landing_images/');
            $photo->move($location,$filename);
            $testimonial->photo = $filename;
        }
        $testimonial->save();

        $request->session()->flash('success', 'Testimonial added.');        
        
        return redirect()->route('testimonials.index');
    }


    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if(!$testimonial) abort(404);

        $testimonials = Testimonial::all()->sortByDesc('updated_at');

        return view('admin.testimonials')->with('testimonial_',$testimonial)->with('testimonials',$testimonials)->with('state','Edit');
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
        $request->validate([
            'photo'=>'mimes:jpeg,bmp,png',            
            'content' => 'required',
            'name' => 'required',
            'profession' => 'required'
        ]);

        $testimonial = Testimonial::find($id);
        if(!$testimonial) abort(404);

        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->content = $request->content;
                
        if($request->hasFile('photo')){
            if($testimonial->photo)
                unlink(public_path('landing_images/'.$testimonial->photo));
            
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('landing_images/');
            $photo->move($location,$filename);
            $testimonial->photo = $filename;
        }
        $testimonial->save();

        $request->session()->flash('success', 'Testimonial updated.');        
        
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $testimonial = Testimonial::find($id);
        if(!$testimonial) abort(404);

        if($testimonial->photo)
            unlink(public_path('landing_images/'.$testimonial->photo));
        $testimonial->delete();
        
        $request->session()->flash('success', 'Testimonial deleted.');        
        
        return redirect()->route('testimonials.index');
    }
}
