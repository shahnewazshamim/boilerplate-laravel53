@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.page.title') }}</h3>
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
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" action="@if(isset($result->id)){{ url("access/permission/edit/$result->id") }}@else{{ url('access/permissions') }}@endif" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="name">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.label.name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="@if(isset($result->name)){{$result->name}}@else{{old('name')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.placeholder.name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="display_name">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.label.display_name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="display_name" name="display_name" class="form-control" value="@if(isset($result->display_name)){{$result->display_name}}@else{{old('display_name')}}@endif" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.placeholder.display_name') }}">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block text-danger">{{ $errors->first('display_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="description">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.label.description') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea id="description" name="description" class="form-control" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.placeholder.description') }}">@if(isset($result->description)){{$result->description}}@else{{old('description')}}@endif</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block text-danger">{{ $errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.form.button.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'permission.section.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        {{ render_grid($columns, $results, url('access/permission')) }}
                    </div>
                    <div class="panel-footer">
                        {{ render_pagination($results) }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection