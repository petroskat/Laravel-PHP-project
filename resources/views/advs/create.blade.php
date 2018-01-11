@extends('layouts.app')

@section('content')
  <h1>Create an Advertisment</h1>
  <div class="container">
    {!! Form::open(['action'=>'AdvsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

      <div class="form-group col-md-4 col-sm-4 col-xs-12">
        {{Form::label('title', 'Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
      </div>

      <div class="form-group col-md-4 col-sm-4 col-xs-12">
        {!!Form::label('Category', 'Category : ')!!}
        {!! Form::select('Category', ['One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five'],null,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-md-4 col-sm-4 col-xs-12">
        {!!Form::label('Price', 'Price : ')!!}
        {!! Form::number('Price','',['placeholder'=>'Price in Euro','name'=>'Price','class'=>'form-control','min'=>'0','max'=>'20000']) !!}
      </div>

      <div class="form-group col-md-4 col-sm-4 col-xs-12">
        {!!Form::label('Region', 'Region : ')!!}
        {!! Form::select('Region', ['Athens'=>'Athens','Thessaloniki'=>'Thessaloniki','Iraklio'=>'Iraklio','Rhodos'=>'Rhodos','Kozani'=>'Kozani'],null,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-xs-12">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description'])}}
      </div>
      <div class="col-xs-12">
        <div class="form-group col-md-6 col-xs-12">
          {!!Form::label('cover_image', 'Upload an image : ')!!}
          {{Form::file('cover_image')}}
        </div>

        <div class="col-md-6 col-xs-12">
          {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
        </div>
      </div>

    {!! Form::close() !!}

  </div><br>
@endsection
