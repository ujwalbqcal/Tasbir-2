<html>
    
    <head>
        <title>Delete Photos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/lightbox.css')}}" type="text/css">
             
    </head>
    
    <body>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="{{asset('js/lightbox-plus-jquery.js')}}"></script>        
        <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script> 


@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <br>
                <h6 style="color:skyblue">Image Name:{{$photo->title}}</h6>
                <a class="btn btn-info" href="{{asset('/albums/'.$photo->album_id)}}" >Back to Gallery</a>
                <hr>
                <a href="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="Cinque Terre"  data-lightbox="roadtrip" height="50" width="100" title="{{$photo->photo}}" >
                <img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}"  class="img-thumbnail" height="240" width="240" >
                </a>
                <br><br>
                
                {!!Form::open(['action'=>['photocontroller@destroy',$photo->id],'method'=>'POST'])!!}
                {{Form::hidden('_method','DELETE')}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-danger" style="margin-top:10px">Delete Image</button>
                    </div>       
                </div>
                             
                {!!Form::close()!!}
                <hr>
                <small>Size:{{$photo->size}}</small>
            </div>
        </div>
        
        
        
    </body>
</html>