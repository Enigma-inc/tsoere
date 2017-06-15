@extends('layouts.master') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margin-top-60">
            <div class="card card-default">
                
                <div class="card-head">
                    <header class="text-lg text-bold text-primary">Upload Your Profile picture</header>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="/update-avatar/{{$profile->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar"
                                 accept=".jpg,.png,.jpeg">

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br><br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="register" type="submit" class="btn btn-primary col-xs-12">
                                    Update
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