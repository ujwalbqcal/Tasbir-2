<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

  <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          
          
            <title>Photo upload</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >
        
    </head>
    
      <body>
          <div class="container">
                <h3 class="alert alert-info" style="margin-top:50px">Select an image to upload </h3>
                <!--<form action="{{Route('upload.file')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <br>
                    <input type="file" name="photo[]" multiple="true"><br>
                    <input type="submit" class="btn btn-info">
                
                </form> -->
                
                <form method="post" action="{{Route('upload.file')}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
                        </div>
                    </div>     
                </form>
             
            </div>
            
           <!-- <div class="row">
                <h2>Show file</h2>
                
                <img src="{{asset('/storage/upload/{{$image->filename}}')}}" alt="">
                
            </div>-->
              


      </body>

</html>
