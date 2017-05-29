@extends('layouts.master-no-menu')

@section('content')
 <section class="section-account">
        <div class="card contain-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <br/>
                        <span class="text-lg text-bold text-primary">Login</span>
                        <br/><br/>
                        <form class="form" action="{{ route('login') }}" accept-charset="utf-8" method="post">
                        {{ csrf_field() }}                      
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email</label>
                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="password">Password</label>
                                <p class="help-block"><a class="text-primary" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <div class="checkbox checkbox-inline checkbox-styled">
                                        <label>
												<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>Remember me</span>
											</label>
                                    </div>
                                </div>
                                <!--end .col -->
                                <div class="col-xs-6 text-right">
                                    <button class="btn btn-primary btn-raised col-xs-12" type="submit">Login</button>
                                </div>
                                <!--end .col -->
                            </div>
                            <!--end .row -->
                        </form>
                    </div>
                    <!--end .col -->
                    <div class="col-sm-5 col-sm-offset-1 text-center">
                        <br><br>
                        <h3 class="text-light">
                            No account yet?
                        </h3>
                        <a class="btn btn-block btn-raised btn-primary" href="{{route('register')}}">Sign up here</a>
                        <br><br>
                        <h3 class="text-light">
                            or
                        </h3>
                        <p>
                            <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-facebook pull-left"></i>Login with Facebook</a>
                        </p>
                        <p>
                            <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-twitter pull-left"></i>Login with Twitter</a>
                        </p>
                    </div>
                    <!--end .col -->
                </div>
                <!--end .row -->
            </div>
            <!--end .card-body -->
        </div>
        <!--end .card -->
    </section>
@endsection
