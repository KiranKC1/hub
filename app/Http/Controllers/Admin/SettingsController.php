<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\LandingImage;
use App\AdditionalInfo;
use App\Rules\NoEmptyContent;
use Session;
use Auth;

class SettingsController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function index(Request $request){
        if($request->query('active'))
            $active = $request->query('active');
        else
            $active = 'home';
            
        $images = LandingImage::all();
        $contact = json_decode(AdditionalInfo::where('alias','contact')->first()->info);
        $about = json_decode(AdditionalInfo::where('alias','about')->first()->info);

        return view('admin.settings')->with('images',$images)->with('contact',$contact)->with('about',$about)->with('active',$active);
    }

    public function addImage(Request $request){

        if($request->hasFile('files')){
            $images = $request->file('files');  
        }

        $count = 0;
        foreach($images as $image){
            $Limage = new LandingImage;
            $filename = time().'l'.$count++ . '.' . $image->getClientOriginalExtension();
            $location = public_path('landing_images/');
            $image->move($location,$filename);
            $Limage->image = $filename;
            $Limage->save();
        }
        
        $request->session()->flash('success', 'Images Uploaded');
        return;
    }

    public function removeImage($id){
        $image = LandingImage::find($id);
        if(!$image) abort(404);

        unlink(public_path('landing_images/'.$image->image));
        $image->delete();

        Session::flash('success', 'Image deleted.');
        return redirect()->route('admin.settings');
    }

    public function contactUpdate(Request $request){

        $contact = AdditionalInfo::where('alias','contact')->first();
        $info = json_decode($contact->info);
        $info->{$request->name} = $request->value;
        $contact->info = json_encode($info);
        $contact->save();

        return;
    }

    public function aboutUpdate(Request $request){

        $validator = Validator::make($request->all(), [
            'aboutImage'=>'mimes:jpeg,bmp,png',            
            'aboutContent' => ['required', new NoEmptyContent],            
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.settings',array('active'=>'about'))->withErrors($validator)->withInput();
        }

        $about = AdditionalInfo::where('alias','about')->first();
        $info = json_decode($about->info);
        $info->content = $request->aboutContent;

        if($request->hasFile('aboutImage')){
            if($info->photo!="")
                unlink(public_path('landing_images/'.$info->photo));
            $image = $request->file('aboutImage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('landing_images/');
            $image->move($location,$filename);
            $info->photo = $filename;
        }

        $about->info = json_encode($info);
        $about->save();

        Session::flash('success', 'About updated.');        
        
        return redirect()->route('admin.settings',array('active'=>'about'));
    }
}