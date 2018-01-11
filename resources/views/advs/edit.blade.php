@extends('layouts.app')

@section('content')
  <h1>Edit Advertisment</h1>
  <div class="container">
    {!! Form::open(['action'=>['AdvsController@update',$adv->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

      <div class="form-group col-md-4 col-xs-12">
        {{Form::label('title', 'Title')}}
        {{Form::text('title',$adv->title,['class'=>'form-control','placeholder'=>'Title'])}}
      </div>

      <div class="form-group col-md-4 col-xs-12">
        {!!Form::label('Category', 'Category : ')!!}
        {!! Form::select('Category', ['One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five'],$adv->category,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-md-4 col-xs-12">
        {!!Form::label('Price', 'Price : ')!!}
        {!! Form::number('Price',$adv->price,['name'=>'Price','class'=>'form-control','min'=>'0','max'=>'20000']) !!}
      </div>

      <div class="form-group col-md-4 col-xs-12">
        {!!Form::label('Region', 'Region : ')!!}
        {!! Form::select('Region', ['Athens'=>'Athens','Thessaloniki'=>'Thessaloniki','Iraklio'=>'Iraklio','Rhodos'=>'Rhodos','Kozani'=>'Kozani'],$adv->region,['class'=>'form-control text-center']) !!}
      </div>

      <div class="form-group col-xs-12">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description',$adv->body,['class'=>'form-control','placeholder'=>'Description'])}}
      </div>
      {{Form::hidden('_method','PUT')}}

      <div class="col-xs-12">
        <div class="form-group col-md-4 col-xs-12">
          {!!Form::label('cover_image', 'Upload an image : ')!!}
          {{Form::file('cover_image')}}
        </div>
        <div class="col-md-4 col-xs-12">
          @if ($adv->cover_image == 'no_image.jpg')
            <div class="alert alert-warning">
              <p>You currently dont have an image :(</p>
            </div>
            @else
              <small>Your current image:  </small>
              <a role="button" class="pop"><img height="80" width="60" class="img-thumbnail" src="/storage/cover_image/{{$adv->cover_image}}"alt="adv_image"></a>
          @endif
        </div>
        <div class="col-md-4 col-xs-12">
          {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
        </div>
      </div>
  </div>
  <br>

  {{-- Modal pop for image  --}}
  <div class="modal fade" id="imagemodal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn-lg" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">{{$adv->title}}</h4>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
    </div>
  </div>
@endsection
