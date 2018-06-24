<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class Albumscontroller extends Controller
{
    public function index(){
        $albums=Album::with('photos')->get();
        return view('albums.index')->with('albums',$albums);
    }
    
    public function create(){
        $albums=Album::with('photos')->get();
        return view('albums.create')->with('albums',$albums);;
    }
    
      public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'image_cover' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
        

/*
        $thumbnailImage = Image::make($originalImage);
*/
        $filenamewithext= $request->file('image_cover')->getClientOriginalName();
        $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);
        $extension=$request->file('image_cover')->getClientOriginalExtension();
        $filenametostore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('image_cover')->storeAs('public/upload',$filenametostore);
       /* $originalImage->resize(150,150);
        $file=$originalImage->getClientOriginalName();
        $originalImage->storeAs('public/originalPath',$file);*/
        
    

        $album= new Album();
        $album->name=$request->input('name');
        $album->description=$request->input('description');
        $album->image_cover=$filenametostore;
        $album->save();

        return redirect('/albums')->with(   'success', 'Your images has been successfully Upload');
 

    }
    
     
        public function show($id){
            $album=Album::with('Photos')->find($id);
            return view('albums.show')->with('album',$album);
        }
}
?>
