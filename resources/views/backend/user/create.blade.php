@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend'.DIRECTORY_SEPARATOR.'user.page.title') }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('message'))
                    <div class="alert {{ Session::get('alert')}} fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-check alert-icon "></i>
                        {{ Session::get('message')}}
                    </div>
                @endif
                <div class="panel panel-default toggle">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" action="@if(isset($result->id)){{ url("user/edit/$result->id") }}@else{{ url('user/create') }}@endif" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="name">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.label.name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="@if(isset($result->name)){{$result->name}}@else{{old('name')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.placeholder.name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="email">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.label.email') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="email" name="email" class="form-control" value="@if(isset($result->email)){{$result->email}}@else{{old('email')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.placeholder.email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="password">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.label.password') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="password" id="password" name="password" {{isset($result->id) ? 'disabled' : ''}} class="form-control" value="@if(isset($result->password)){{$result->password}}@else{{old('password')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.placeholder.password') }}">
                                    @if(isset($result->id))
                                        <div class="toggle-custom toggle-inline">
                                            <label class="checkbox" data-on="ON" data-off="OFF">
                                                <input type="checkbox">
                                                <span class="button-checkbox"></span>
                                            </label>
                                            <label for=""> Update</label>
                                        </div>
                                    @endif
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="assigned">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.label.assigned_roles') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="col-lg-10 col-md-9">
                                        @foreach($roles as $role)
                                            <div class="toggle-custom">
                                                <label class="toggle" data-on="ON" data-off="OFF">
                                                    <input type="checkbox" id="role-{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ set_checked($role->id, $assigned, 'role_id') }}>
                                                    <span class="button-checkbox"></span>
                                                </label>
                                                <label for="role-{{ $role->id }}">{{ $role->display_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.form.button.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection