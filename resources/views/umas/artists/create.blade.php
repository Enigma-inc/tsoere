@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-default">

                <div class="card-head">
                    <header class="text-lg text-bold text-primary">Add UMAs Nominee</header>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('umas.artists.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="margin-bottom-40 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Artist Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="margin-bottom-40 form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-3 control-label">Code</label>

                            <div class="col-md-8">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" >

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="margin-bottom-40 form-group{{ $errors->has('song') ? ' has-error' : '' }}">
                            <label for="song" class="col-md-3 control-label">Song</label>

                            <div class="col-md-8">
                                <input id="song" type="text" class="form-control" name="song" value="{{ old('song') }}" >

                                @if ($errors->has('song'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('song') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="margin-bottom-40 form-group{{ $errors->has('artwork') ? ' has-error' : '' }}">
                            <label for="artwork" class="col-md-3 control-label">Image</label>

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

                        <div class="margin-bottom-40 form-group{{ $errors->has('mp3') ? ' has-error' : '' }}">
                                <label for="mp3" class="col-md-3 control-label">Promotional Song</label>

                                <div class="col-md-8">
                                    <input id="mp3" type="file" class="form-control" name="mp3" accept=".mp3" required>

                                    @if ($errors->has('mp3'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mp3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="margin-bottom-40 form-group{{ $errors->has('youtube-id') ? ' has-error' : '' }}">
                            <label for="youtube-id" class="col-md-3 control-label">youtube video Id</label>

                            <div class="col-md-8">
                                <input id="youtube-id" type="text" class="form-control" name="youtube-id" value="{{ old('youtube-id') }}" >

                                @if ($errors->has('youtube-id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube-id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class=" margin-bottom-40  form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-3 control-label">Select Category</label>

                          <div class="col-md-8">
                                     <select id="category" name="category" class="form-control" required>
                              <option value="">-- Pick One --</option>
        										 @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
          											</select>
                                         @if ($errors->has('category'))
                                             <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
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
