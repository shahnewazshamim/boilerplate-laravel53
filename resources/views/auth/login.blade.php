@extends('layouts.backend.auth')

@section('content')

    <div class="container login-container">
        <div class="login-panel panel panel-default plain animated bounceIn">
            <div class="panel-body">
                <form class="form-horizontal mt0" id="frm-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group input-icon">
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                <span class="input-group-addon"><i class="icomoon-icon-user s16"></i></span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group input-icon">
                                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Password" required>
                                <span class="input-group-addon"><i class="icomoon-icon-lock s16"></i></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                            <span class="help-block text-right"><a href="{{ url('password/reset') }}">Forgout password ?</a></span>
                        </div>
                    </div>
                    <div class="form-group mb0">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                            <div class="checkbox-custom">
                                <input type="checkbox" name="remember" id="remember" value="option">
                                <label for="remember">Remember me ?</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                            <button class="btn btn-default pull-right" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer gray-lighter-bg">
                <h4 class="text-center"><strong>Don`t have an account ?</strong>
                </h4>
                <p class="text-center"><a href="{{ url('/register') }}" class="btn btn-success">Create account</a>
                </p>
            </div>
        </div>
    </div>

@endsection
