@extends('layouts.master') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margin-top-60">
            <div class="card card-default">
                
                <div class="card-head">
                    <header class="text-lg text-bold text-primary">Upload Your Track / Poem</header>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('track.store',['artistId'=>Auth::user()->profile->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="margin-bottom-40 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">Track/Poem Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                    <div class="margin-bottom-40 form-group{{ $errors->has('mp3') ? ' has-error' : '' }}">
                            <label for="mp3" class="col-md-3 control-label">Audio</label>

                            <div class="col-md-8">
                                <input id="mp3" type="file" class="form-control" name="mp3" accept=".mp3" required>

                                @if ($errors->has('mp3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mp3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="margin-bottom-40 form-group{{ $errors->has('artwork') ? ' has-error' : '' }}">
                            <label for="artwork" class="col-md-3 control-label">Artwork</label>

                            <div class="col-md-8">
                                <input id="artwork" type="file" class="form-control" name="artwork"
                                 accept=".jpg,.png,.jpeg" required>

                                @if ($errors->has('artwork'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('artwork') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class=" margin-bottom-40  form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                            <label for="genre" class="col-md-3 control-label">Select Genre</label>

                            <div class="col-md-8">
                                       <select id="genre" name="genre" class="form-control" required>
                                                <option value=""></option>                                       
											 @foreach($genres as $genre)
                                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                                            @endforeach
												</select>                      
                                 @if ($errors->has('genre'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                 @endif
                            </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
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