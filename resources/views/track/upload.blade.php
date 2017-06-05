@extends('layouts.master') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margin-top-60">
            <div class="card card-default">
                
                <div class="card-head">
                    <header class="text-lg text-bold text-primary">Upload Your Track</header>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('track.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Track Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('mp3') ? ' has-error' : '' }}">
                            <label for="mp3" class="col-md-4 control-label">Audio</label>

                            <div class="col-md-6">
                                <input id="mp3" type="file" class="form-control" name="mp3"
                                 accept=".mp3">

                                @if ($errors->has('mp3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mp3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('artwork') ? ' has-error' : '' }}">
                            <label for="artwork" class="col-md-4 control-label">Artwork</label>

                            <div class="col-md-6">
                                <input id="artwork" type="file" class="form-control" name="artwork"
                                 accept=".jpg,.png,.jpeg">

                                @if ($errors->has('artwork'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('artwork') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="register" type="submit" class="btn btn-primary col-xs-12">
                                    Submit
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