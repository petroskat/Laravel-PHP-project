@extends('layouts.app')

@section('content')
  <div class="row text-center">
    <a href="/advs" onclick="goBack()" class="btn btn-link pull-right">Go Back</a>
    <div class="col-xs-6 col-xs-offset-3">
      <table>
        <tr>
          <td><h1>{{$adv->title}}</h1></td>
        </tr>
        <tr>
          <td><a href="#" class="pop"><img height="150" width="250" src="/storage/cover_image/{{$adv->cover_image}}" alt="Advertisement_Image"></a></td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <div class="container row">
    <div class="jumbotron">
      {!!$adv->body!!}
    </div>

    <div>
      <small>Created on {{$adv->created_at}}</small>
      @if ($adv->created_at != $adv->updated_at)
        <small> and updated on {{$adv->updated_at}}</small>
      @endif
    </div>
    <div>
      <small>Written by {{$adv->user->name}}</small>
    </div>
    <br>
    @if (!Auth::guest() && Auth::user()->id == $adv->user_id)
      <table class="table">
        <tr>
          <td> <a href="/advs/{{$adv->id}}/edit" class="btn btn-primary">Edit</a> </td>
          <td>
            {!! Form::open(['action'=>['AdvsController@destroy',$adv->id],'method'=>'POST']) !!}
              {{Form::hidden('_method','DELETE')}}
              {{Form::Submit('Delete',['class'=>'btn btn-danger pull-right'])}}
            {!! Form::close() !!}
          </td>
        </tr>
      </table>

    @endif

  </div>
  {{-- Modal pop for image  --}}
  <div class="modal fade" id="imagemodal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
      <div class="modal-footer">
        <p class="text-center">{{$adv->title}}</p>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
