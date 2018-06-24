<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;


class photocontroller extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id',$album_id);
    }
    
       public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'photo' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
        

/*
        $thumbnailImage = Image::make($originalImage);
*/
        $filenamewithext= $request->file('photo')->getClientOriginalName();
        $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);
        $extension=$request->file('photo')->getClientOriginalExtension();
        $filenametostore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenametostore);
       /* $originalImage->resize(150,150);
        $file=$originalImage->getClientOriginalName();
        $originalImage->storeAs('public/originalPath',$file);*/
        
    

        $photo= new Photo;
        $photo->album_id=$request->input('album_id');
        $photo->title=$request->input('title');
        $photo->description=$request->input('description');
        $photo->size=$request->file('photo')->getClientSize();
        $photo->photo=$filenametostore;
        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Your image has been successfully Uploaded!');
 

    }
    
    public function show($id){
            $photo=photo::find($id);
            return view('photos.show')->with('photo',$photo);
        }
    
    public function destroy($id){
        $photo=photo::find($id);
        
        if(storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/')->with('sucess','Image deleted!');
        }
    }

}

