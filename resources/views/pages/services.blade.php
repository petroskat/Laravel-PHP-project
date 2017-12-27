@extends('layouts.app')


@section('content')
      <h1 class="text-center">{{$title}}</h1>

      <div class="text-center col-xs-6 col-xs-offset-3">
        @if(count($services) >0)
          <ul class="list-group">
            @foreach($services as $serv)
              <li class="list-group-item">{{$serv}}</li>
            @endforeach
          </ul>
        @endif

      </div>
@endsection
