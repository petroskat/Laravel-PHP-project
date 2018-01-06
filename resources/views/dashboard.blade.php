@extends('layouts.app')

@section('content')
<div class="container row">
  <br>
        <div class="col-md-4 col-xs-12 well">
          <h4 class="text-center">My Profile Section</h4>
          <table class="table table-striped table-responsive-sm text-center">
            <tr>
              <td><img height="85" width="200" src="/storage/cover_image/avatar.jpg" alt="Avatar_img"></td>
            </tr>
            <tr>
              <td><p>Welcome back, <i><b>{{$user->name}}</b></i></p></td>
            </tr>
            <tr>
              <td><p>You currently have <i><b><u>{{count($advs)}}</u></b></i> Advertisments , feel free to add more !!</p></td>
            </tr>
            <tr>
              <td><p>Your email is : <b><i>{{$user->email}}</i></b></p></td>
            </tr>
            <tr>
              <td><a class="btn btn-primary" href="/changePassword">Change Password</a></td>
            </tr>
          </table>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">Dashboard</h3></div>
                <div class="panel-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-center">Your Advertisments</h4>
                    @if (count($advs) > 0)
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>Title</th>
                          <th></th>
                          <th></th>
                        </tr>
                        @foreach ($advs as $adv)
                          <tr>
                            <td><strong><a href="/advs/{{$adv->id}}">{{$adv->title}}</a></strong></td>
                            <td> <a href="/advs/{{$adv->id}}/edit" class="btn btn-primary">Edit</a> </td>
                            <td>
                              {!! Form::open(['action'=>['AdvsController@destroy',$adv->id],'method'=>'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                              {!! Form::close() !!}
                            </td>
                          </tr>
                        @endforeach
                      </table>
                    @else
                      <br>
                      <div class="text-center">
                        <p><strong>You have no Advertisments yet</strong></p>
                        <h1>:(</h1>
                      </div>
                    @endif

                </div>
            </div>
            <a href="/advs/create" class="btn btn-primary pull-right">Create Advertisment</a>
        </div>
</div><br>
@endsection
