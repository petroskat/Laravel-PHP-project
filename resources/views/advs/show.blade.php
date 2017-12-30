@extends('layouts.app')

@section('content')
  <div class="row text-center">
    <a href="/advs" onclick="goBack()" class="btn btn-link pull-right">Go Back</a>
    <h1>{{$adv->title}}</h1>
    <div class=".col-xs-4 col-xs-offset-4">
      <table>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td><a href="#" class="pop"><img height="180" width="320" src="/storage/cover_image/{{$adv->cover_image}}" alt="Advertisement_Image"></a></td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <table style="width:100%">
    <tr>
      <th><strong>Category : </strong>{{$adv->category}}</th>
      <th><strong>Region : </strong>{{$adv->region}}</th>
      <th><strong>Price : </strong>{{$adv->price}} &euro;</th>
    </tr>
  </table>
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
