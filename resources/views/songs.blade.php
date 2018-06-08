@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/postsstore') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <div class="col-md-4 control-label"></div>
                            <div class="col-md-4 control-label">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 control-label">
                                <h1>Add A Song</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Artist</label>
                            <div class="col-md-6">
                                <input type="text" name="artist" class="form-control">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Lyrics</label>
                            <div class="col-md-6">
                                <textarea type="text" name="lyrics" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Song
                                </button>
                            </div>
                        </div>
                    </form>

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Lyrics</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th style = "display:none" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($songs as $key => $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->artist}}</td>
                                <td>{{$data->lyrics}}</td>
                                <td><a href="{{ url('postsedit', $data->id) }}">Edit</a></td>
                                <td><a href="{{ url('postsdelete', $data->id) }}">Delete</a></td>
                                <td class="songID" style = "display:none" >{{$data->id}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                   
                </div>
            </div>
        </div>
    </div>
</div>

                <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            @foreach($songs as $key => $data)
                            <h4 class="modal-title">{{$data->title}}</h4>
                            <h4 class="modal-title">{{$data->artist}}</h4>
                            @endforeach
                          </div>
                          <div class="modal-body">
                            <p>{{}}</p>
                          </div>

                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>


@endsection
