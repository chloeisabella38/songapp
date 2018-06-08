@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                  @foreach ($songs as $key => $data)
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('postsupdate', $data->id) }}">
                     @endforeach
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-6 control-label">
                                @if(session()->has('message'))
                                    <div class="col-md-6 alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 control-label">
                                <h1>Edit A Song</h1>
                            </div>
                        </div>

                        @foreach ($songs as $key => $data)
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" placeholder="{{$data->title}}" value="{{$data->title}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Artist</label>
                            <div class="col-md-6">
                                <input type="text" name="artist" class="form-control" placeholder="{{$data->artist}}" value="{{$data->artist}}">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Lyrics</label>
                            <div class="col-md-6">
                                <textarea type="text" name="lyrics" class="form-control" placeholder="{{$data->lyrics}}" rows="10">{{$data->lyrics}}</textarea>
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Song
                                </button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
