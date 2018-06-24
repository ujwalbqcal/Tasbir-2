 @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif


        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="callout alert">  {{ $error }}
                </div> 
            @endforeach
      @endif

 @if(session('error'))
        <div class="callout alert">
          {{ session('error') }}
        </div> 
        @endif