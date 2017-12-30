@extends('layouts.app')


@section('content')
  <div class="jumbotron text-center row">
    <h1>The best Advertisement app !!</h1>
    @if (Auth::guest())
      <p>Welcome Guest .. feel free to browse ads Register and add yours !!</p>
      <p>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
      </p>
    @else
      <p>{{auth()->user()->name}}, welcome .. feel free to browse ads and add yours !!</p>
    @endif
    <br><hr><br>
    <div class="col-xs-6 col-xs-offset-3">
      <div class="Search_machine ">
          <form class="form-group" action="/search/" method="GET">
              <label for="s">Want a quick result?? </label><br>
              <input class="form-control text-center" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search Advertisements"/>
              <small>Press 'Enter'</small>
          </form>
      </div>
      <br>
      <div class='form-group'>
        <h3><strong><u>Or use the above search system : </u></strong></h3>
        <hr>
        {!! Form::open(['action'=>['SearchesController@search'],'method'=>'POST']) !!}

          <div class="form-group">
            {!!Form::label('Category', 'Category : ')!!}
            {!! Form::select('Category', ['One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five'],null,['class'=>'form-control text-center']) !!}
          </div>

          <div class="form-group">
            {!!Form::label('Price', 'Price : ')!!}
            <div name="Price" class="form-inline">
              {!!Form::label('minPrice', 'Min : ')!!}
              {!! Form::number('minPrice','',['name'=>'minPrice','class'=>'form-control','min'=>'0','max'=>'19999']) !!} -
              {!! Form::number('maxPrice','',['name'=>'maxPrice','class'=>'form-control','min'=>'1','max'=>'20000']) !!}
              {!!Form::label('maxPrice', ' : Max')!!}
            </div>
          </div>

          <div class="form-group">
            {!!Form::label('Region', 'Region : ')!!}
            {!! Form::select('Region', ['Athens'=>'Athens','Thessaloniki'=>'Thessaloniki','Iraklio'=>'Iraklio','Rhodos'=>'Rhodos','Kozani'=>'Kozani'],null,['class'=>'form-control text-center']) !!}
          </div>
          {{Form::Submit('Search',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection
