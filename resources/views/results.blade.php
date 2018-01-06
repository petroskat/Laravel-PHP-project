@extends('layouts.app')


@section('content')
  <h1 class="text-center">Search Results</h1>
  <hr>
  <div class="container row">
    @if (count($advs) > 0)
      @foreach ($advs as $adv)
        <div class="col-xs-12 well grow text-center" style="border-radius: 25px;">
          <a href="/advs/{{$adv->id}}"><div class="row">
            <div class="col-md-4 col-sm-4">
              <img height="150" width="200" src="/storage/cover_image/{{$adv->cover_image}}" alt="Advertisement_Image">
            </div>
            <div class="col-md-8 col-sm-8">
              <h3>{{$adv->title}}</h3>
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
          </div></a>
        </div>
      @endforeach
      {{$advs->links()}}
    @else
      <div class='text-center'>
        <h4>We couldnt find any Advertisments :(</h4>
        <strong>But you can try again..</strong>
      </div>
    @endif
  </div>
@endsection
