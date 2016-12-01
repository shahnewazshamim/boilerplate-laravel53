@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend'.DIRECTORY_SEPARATOR.'role.page.title') }}</h3>
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
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" action="@if(isset($result->id)){{ url("access/role/edit/$result->id") }}@else{{ url('access/roles') }}@endif" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="name">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="@if(isset($result->name)){{$result->name}}@else{{old('name')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="display_name">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.display_name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="display_name" name="display_name" class="form-control" value="@if(isset($result->display_name)){{$result->display_name}}@else{{old('display_name')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.display_name') }}">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block text-danger">{{ $errors->first('display_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="description">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.description') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea id="description" name="description" class="form-control" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.description') }}">@if(isset($result->description)){{$result->description}}@else{{old('description')}}@endif</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block text-danger">{{ $errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="description">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.modules') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="col-lg-10 col-md-9">
                                        @foreach($modules as $module)
                                            <div class="toggle-custom">
                                                <label class="toggle" data-on="ON" data-off="OFF">
                                                    <input type="checkbox" id="module-{{ $module->id }}" name="" value="{{ $module->name }}" {{ checked('', $module->name) }}>
                                                    <span class="button-checkbox"></span>
                                                </label>
                                                <label for="module-{{ $module->id }}">{{ $module->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="description">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.actions') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    @foreach($permissions as $permission)
                                        <div class="toggle-custom toggle-inline">
                                            <label class="toggle" data-on="YES" data-off="NO">
                                                <input type="checkbox" id="permission-{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{ set_checked($permission->id, $current, 'permission_id') }}>
                                                <span class="button-checkbox"></span>
                                            </label>
                                            <label for="permission-{{ $permission->id }}">{{ $permission->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.button.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.section.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        {{ render_grid($columns, $results, url('access/role')) }}
                    </div>
                    <div class="panel-footer">
                        {{ render_pagination($results) }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection