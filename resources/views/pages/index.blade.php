@extends('layouts.app')


@section('content')
  <div class="jumbotron text-center">
    <h1>The best Advertisement app !!</h1>
    @if (Auth::guest())
      <p>Welcome Guest .. feel free to browse ads Register and add yours !!</p>
      <p>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
      </p>
    @else
      <p>{{auth()->user()->name}}, welcome .. feel free to browse ads and add yours !!</p>
    @endif
    <br><hr><br>
    <div class="Search_machine">
        <form class="form-group" action="/search/" method="GET">
            <label for="s">Want a quick result?? </label><br>
            <input class="form-control text-center" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search Advertisements"/>
        </form>
    </div>

  </div>

@endsection
