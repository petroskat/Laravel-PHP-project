@extends('layouts.app')

@section('content')
  <div class="row text-center">
    <h1>{{$adv->title}}</h1>
    <div class="col-md-4 col-xs-12 col-md-offset-4">
      <table>
        <tr>
          <td></td>
        </tr>
        <tr>
          @if ($adv->cover_image == 'no_image.jpg')
            <td><img height="130" width="300" src="/storage/cover_image/{{$adv->cover_image}}" alt={{$adv->title}}></td>
          @else
            <td><a role="button" class="pop"><img height="130" width="250" src="/storage/cover_image/{{$adv->cover_image}}" alt={{$adv->title}}></a></td>
          @endif
        </tr>
      </table>
    </div>
  </div>
  <br>
  <table style="width:100%;">
    <tr>
      <th style="text-align:center"><strong>Category : </strong>{{$adv->category}}</th>
      <th style="text-align:center"><strong>Region : </strong>{{$adv->region}}</th>
      <th style="text-align:center"><strong>Price : </strong>{{$adv->price}} &euro;</th>
    </tr>
  </table>
  <br>
  <div class="container row">
    <div class="well">
      {!!$adv->body!!}
    </div>

    <div class="text-center">
      <small>Created on {{$adv->created_at}}</small>
      @if ($adv->created_at != $adv->updated_at)
        <small> and updated on {{$adv->updated_at}}</small>
      @endif
    </div>
    <div class="text-center">
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
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close btn-lg" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img src="" class="imagepreview" style="width:100%;height:420px;" >
      </div>
      <div class="modal-footer">
        <h4 class="text-center">{{$adv->title}}</h4>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
