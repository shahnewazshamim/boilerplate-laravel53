@extends('layouts.backend.app')

@section('content')

    <div id="back-to-home">
        <a href="" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
    </div>
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <a href=""><span><i class="fa fa-gg"></i></span><span> Admin Panel</span></a>
        </div>
        <div class="simple-page-form animated flipInY" id="reset-password-form">
            <h4 class="form-title m-b-xl text-center">Forgot Your Password ?</h4>
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Enter your email address" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary" value="Send Password Reset Link">
            </form>
        </div>
    </div>

@endsection
