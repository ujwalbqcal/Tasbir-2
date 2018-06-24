<html>
    
    <head>
        <title>Image upload</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    </head>
    
    <body>
        
       
                
@extends('layouts.app')
@section('content')
      
{!!Form::open(['action'=>'photocontroller@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

         <div class="container">
            <div class="row">
                <br>
                <h3 class="alert alert-info">Upload an Image</h3>
                <div class="row">
                    <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="title" placeholder="Image Name">
                            <input type="text" class="form-control"  name="description" placeholder="Photo description">
<!--
                            <input type="hidden" name="album_id" value="album_id">
-->
                            {{Form::hidden('album_id',$album_id)}}
                            <input type="file" name="photo"  class="form-control">
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

                
{!!Form::close()!!}
@endsection
               
        
    </body>
</html>