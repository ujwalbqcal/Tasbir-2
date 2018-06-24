<html>
    
    <head>
        <title>Album Create</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    </head>
    
    <body>
        
       
                
        @extends('layouts.app')
    @section('content')
      
      
{!!Form::open(['action'=>'Albumscontroller@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

         <div class="container">
            <div class="row">
                <br>
                <h3 class="alert alert-info">Create an album</h3>
                <div class="row">
                    <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="name" placeholder="Album Name">
                            <input type="text" class="form-control"  name="description" placeholder="Album description">
                            <input type="file" name="image_cover" id="image_cover" class="form-control">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
                    </div>       
                </div>
             </div>
        </div>
        <hr>
        
{!!Form::close()!!}
        
        
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