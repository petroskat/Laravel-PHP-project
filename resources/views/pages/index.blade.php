@extends('layouts.app')


@section('content')
  <div class="jumbotron text-center row">
    <h2>The best Advertisement app around !!</h2>
    @if (Auth::guest())
      <p>Welcome Guest .. feel free to browse ads Register and add yours !!</p>
      <p>
        <a class="btn btn-primary" href="/login" role="button">Login</a>
        <a class="btn btn-success" href="/register" role="button">Register</a>
      </p>
    @else
      <p>{{auth()->user()->name}}, welcome .. feel free to browse ads and add yours !!</p>
    @endif
    <hr><br>
    <div class="">
      <div class='col-md-6 col-xs-12 text-center form-group'>
        <h3><u><b>Search:</b></u></h3>
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
            {!! Form::select('Region', ['','Athens'=>'Athens','Thessaloniki'=>'Thessaloniki','Iraklio'=>'Iraklio','Rhodos'=>'Rhodos','Kozani'=>'Kozani'],null,['class'=>'form-control text-center']) !!}
          </div>
          {{Form::Submit('Search',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="col-md-2">
      {{-- just to fill the void --}}
    </div>
    <div class="sidebar col-md-4 col-xs-12 shadow" style="border-radius: 25px;">
      @include('inc.sidebar')
    </div>
  </div>

@endsection
