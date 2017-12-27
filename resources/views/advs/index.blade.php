@extends('layouts.app')

@section('content')
  <h1 class="text-center">Advertisments</h1>
  <hr>
  <div class="container">
    @if (count($advs) > 0)
      @foreach ($advs as $adv)
        <div class="well">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <img height="150" width="200" src="/storage/cover_image/{{$adv->cover_image}}" alt="Advertisement_Image">
            </div>
            <div class="col-md-8 col-sm-8">
              <h3><a href="/advs/{{$adv->id}}">{{$adv->title}}</a></h3>
              <div>
                <small>Created on {{$adv->created_at}}</small>
                @if ($adv->created_at != $adv->updated_at)
                  <small> and updated on {{$adv->updated_at}}</small>
                @endif
              </div>
              <div>
                <small>Written by {{$adv->user->name}}</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      {{$advs->links()}}
    @else
      <p>There are no Advertisments yet :(</p>
    @endif
  </div>
@endsection
