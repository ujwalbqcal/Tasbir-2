<html>
    
    <head>
        
        <title>Gallery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/lightbox.css')}}" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>        

    </head>
    
    <body>

@extends('layouts.app')

@section('content')
        <br>
        
        <div class="container">
            <div class="row">
                <h4>Album Name: {{$album->name}}</h4>
                <a class="btn btn-info" href="{{asset('/photos/create/'.$album->id)}}">Upload an image <span class="glyphicon glyphicon-envelope"></span></a>
                <hr>
            </div>
        </div>
        
        
    @if(count($album->photos)>0)
    <?php
    $colcount=count($album->photos);
    $i=1;
    ?>
<br>
<div id="photos">
    <div class="container">
        <div class="row">
    <div class="col-md-6">
        
        @foreach($album->photos as $photo)
        @if($i==$colcount+1)
        
            <div class="col-md-4 end">
                
                  <a href="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="Cinque Terre"  data-lightbox="roadtrip" height="240" width="240" title="{{$photo->photo}} <br> <br><a href={{asset('/photos/'.$photo->id)}} >Delete the Photo</a> " >
                <img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}"  class="img-thumbnail" height="300" width="300"  >
               <!-- 
                <a href="{{asset('/photos/'.$photo->id)}}" >
                    <img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}"  class="img-thumbnail" height="240px" width="240px" >-->
                </a>
                <br>
                <h4>{{$photo->titile}}</h4>
        </div>
        
        
        @else
                <div class="row">
                  <div class="col-md-4">
                      <a href="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="Cinque Terre"  data-lightbox="roadtrip" height="50" width="100" title="{{$photo->photo}} <br> <br><a href={{asset('/photos/'.$photo->id)}}>Delete the Photo</a>">
                <img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}"  class="img-thumbnail" height="300" width="300" >
                      
                      
                  <!--
                      <a href="{{asset('/photos/'.$photo->id)}}" >
                    <img src="{{asset('/storage/photos/'.$photo->album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}"  class="img-thumbnail" height="240px" width="240px" >-->
                </a>
                <br>
                <h4>{{$photo->title}}</h4>
          @endif
        @if($i%3==0)
                </div></div><div class="row text-center">
        @else
        </div>
        @endif
        <?php $i++; ?>
        @endforeach
        </div>
        </div>
</div>
        </div>
@else
        <div class="alert alert-info" style="text-align:left;margin-left:100;margin-right:100">
            <strong>Info!</strong>No photos to display
        </div>
@endif

@endsection
        
    </body>
</html>

