@extends('layouts.app')

@section('content')
  <h1>Edit Advertisment</h1>
  <div class="container">
    {!! Form::open(['action'=>['AdvsController@update',$adv->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

      <div class="form-group col-xs-4">
        {{Form::label('title', 'Title')}}
        {{Form::text('title',$adv->title,['class'=>'form-control','placeholder'=>'Title'])}}
      </div>

      <div class="form-group col-xs-4">
        {!!Form::label('Category', 'Category : ')!!}
        {!! Form::select('Category', ['One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five'],$adv->category,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-xs-4">
        {!!Form::label('Price', 'Price : ')!!}
        {!! Form::number('Price',$adv->price,['name'=>'Price','class'=>'form-control','min'=>'0','max'=>'20000']) !!}
      </div>

      <div class="form-group col-xs-4">
        {!!Form::label('Region', 'Region : ')!!}
        {!! Form::select('Region', ['Athens'=>'Athens','Thessaloniki'=>'Thessaloniki','Iraklio'=>'Iraklio','Rhodos'=>'Rhodos','Kozani'=>'Kozani'],$adv->region,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-xs-12">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description',$adv->body,['class'=>'form-control','placeholder'=>'Description'])}}
      </div>
      {{Form::hidden('_method','PUT')}}

      <table class="col-xs-12">
        <tr>
          <td>
            <div class="form-group col-xs-12">
            {{Form::file('cover_image')}}
            </div>
          </td>

          <td>
            <div class="col-xs-12">
            {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
          </div>
        </td>
      </tr>
    </table>

    {!! Form::close() !!}

  </div>
@endsection
