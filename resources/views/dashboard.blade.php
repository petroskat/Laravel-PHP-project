@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">Dashboard</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-center">Your Advertisments</h4>
                    @if (count($advs) > 0)
                      <table class="table table-striped">
                        <tr>
                          <th>Title</th>
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
    </div>
</div>
@endsection
