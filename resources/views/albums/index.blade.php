<html>
    
    <head>
        
        <title>Albums</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/lightbox.css')}}" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>        

    </head>
    
    <body>

@extends('layouts.app')

@section('content')
    @if(count($albums)>0)
    <?php
    $colcount=count($albums);
    $i=1;
    ?>
<br>
<div id="albums">
    <div class="container">
    <div class="col-md-8">
        
        @foreach($albums as $album)
        @if($i==$colcount)
        
            <div class="col-md-4 end">
                <a href="{{asset('/albums/'.$album->id)}}" >
                    <img src="{{asset('/storage/upload/'.$album->image_cover)}}" alt="{{$album->name}}"  class="img-thumbnail" height="240px" width="240px" >
                </a>
                <br>
                <h4>{{$album->name}}</h4>
        @else
                  <div class="col-md-4">
                      <a href="{{asset('/albums/'.$album->id)}}" >
                          <img src="{{asset('/storage/upload/'.$album->image_cover)}}" alt="{{$album->name}}"  class="img-thumbnail" height="240px" width="240px" >                     
                      </a>
                      <br>
                      <h4>{{$album->name}}</h4>
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
@else
         <div class="container">
             <div class="alert alert-info">
            <strong>Info!</strong>No photos to display!
                </div>
        </div>
@endif

@endsection
        
    </body>
</html>