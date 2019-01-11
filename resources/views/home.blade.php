@extends('layouts.app')

@section('content')

<body>
    <center>
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-5 col-lg-offset-3 col-lg-5">
      <h2>Добро пожаловать {{ Auth::user()->name }}</h2>
        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
        @if (session('statusdelete'))
        <div class="alert alert-danger">
        {{ session('statusdelete') }}
        </div>
        @endif
       
        {!!Form::open(['route'=>'home.store'])!!}
        <!-- Form Starts Here -->
        <div class="form">
          <div class="input-group">
          <input type="text" class="form-control" name="name" >
          <input type="hidden" class="form-control" name="user_id" value = "{{Auth::user()->id}}" >
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit"><span
                class="glyphicon glyphicon-plus"></span> Добавить задание</button>
            </span>
          </div><!-- /input-group -->
        </div>
        {!!Form::close()!!}
        <hr/>
        <!-- Form Ends Here -->
        <!-- Task List Starts Here -->
        @foreach ($todos as $todo)
            
        
        <ul class="list-group">
          <li class="list-group-item clearfix task" > 
          <p class="lead">{{$todo->name}}</p>
            <div>
              <span class="pull-right">
                   
                <a href="{{route('home.edit', $todo->id)}}" class="btn btn-primary btn-xs" >Изменить<span class="glyphicon glyphicon-repeat" 
                 ></span></a>
                
                 {!!Form::open(['method' => 'DELETE', 'route' => ['home.destroy', $todo->id]])!!}
                 
                 {!!Form::submit('Удалить', ['class'=>'btn btn-danger btn-xs'])!!}
                 {!!Form::close()!!}
              </span>
            </div>
          </li>
        </ul>
        @endforeach
        <!-- Task List Ends Here -->
      </div>
    </div>
</center>
  </body>
@endsection
