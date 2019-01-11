
@extends('layouts.app')

@section('content')
<body>
    <center>
    
       
           <div class="container">
              <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-5 col-lg-offset-3 col-lg-5">
        {!!Form::open(['method' => 'PUT', 'route' => ['home.update', $todos->id]])!!}
        <!-- Form Starts Here -->
        <div class="form">
          <div class="input-group">
          <input type="text" class="form-control" name="name">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit"><span
                class="glyphicon glyphicon-plus"></span> Обновить</button>
            </span>
          </div><!-- /input-group -->
        </div>
        {!!Form::close()!!}
        <hr/>
        <!-- Form Ends Here -->
        <!-- Task List Starts Here -->
       
        <!-- Task List Ends Here -->
      </div>
    </div>
</center>
  </body>

@endsection