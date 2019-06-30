<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Gallery;
use Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function index()
    {
        $albums = Album::orderBy('year','desc')->orderBy('created_at','desc')->get();
        return view('admin.albums.index')->with('albums',$albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'name'=>'required|max:191',
            'year'=> 'required'
        ),array(
            'name.required' => 'Album name is required',
            'year.required' => 'ALbum year is required'
        ));

        $i = 1;
        $name = $request->name;
        while(Album::where('name', $name)->where('year', $request->year)->exists()){
            $name = $request->name. '('.$i.')';
            $i++;
        }
        
        $slug = str_replace(' ','-',strtolower($name));
        $album = new Album;
        $album->name = $name;
        $album->year = $request->year;
        $album->slug = $slug.'-'.$request->year;

        $album->save();

        $request->session()->flash('success', 'New album created');

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        if(!$album)
            abort(404);

        return view('admin.albums.show')->with('album',$album);
    }

    public function addImages($id,Request $request){
        $album = Album::find($id);
        if(!$album) abort(404);
        
        if($request->hasFile('files')){
            $images = $request->file('files');  
        }

        $count = 0;
        foreach($images as $image){
            $gallery = new Gallery;
            $filename = time().'G'.$count++ . '.' . $image->getClientOriginalExtension();
            $location = public_path('gallery/');
            $image->move($location,$filename);
            $gallery->image = $filename;
            $gallery->album_id = $id;
            $gallery->save();
        }
        
        $request->session()->flash('success', 'Images Uploaded');
        return;
    }

    public function deleteImage($album_id, $image_id,Request $request)
    {
        $gallery = Gallery::find($image_id);
        if(!$gallery) abort(404);

        unlink(public_path('gallery/'.$gallery->image));
        $gallery->delete();

        $request->session()->flash('success', 'Image Deleted');
        return redirect()->route('albums.show',$album_id);
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
        $request->validate(array(
            'editname'=>'required|max:191',
            'edityear'=> 'required'
        ),array(
            'editname.required' => 'Album name is required',
            'edityear.required' => 'ALbum year is required'
        ));
        
        $i = 1;
        $name = $request->editname;
        $album = Album::find($id);
        if(!$album) abort(404);

        if($name != $album->name){
            while(Album::where('name', $name)->where('year', $request->edityear)->exists()){
                $name = $request->editname. '('.$i.')';
                $i++;
            }
        }
        
        $slug = str_replace(' ','-',strtolower($name));
        
        $album->name = $name;
        $album->year = $request->edityear;
        $album->slug = $slug.'-'.$request->edityear;
        $album->save();

        $request->session()->flash('success', 'Album upated');

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $album = Album::find($id);
        if(!$album) abort(404);

        foreach($album->album_images as $image){
            unlink(public_path('gallery/'.$image->image));
        }
        $album->delete();

        $request->session()->flash('success', 'Album deleted');

        return redirect()->route('albums.index');
    }
}
