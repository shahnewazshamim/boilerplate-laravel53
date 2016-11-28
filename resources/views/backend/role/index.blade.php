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
                        <form class="form-horizontal group-border stripped" action="{{ url('access/role') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="name">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ get_option('name') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="display_name">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.display_name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="display_name" name="display_name" class="form-control" value="{{ get_option('display_name') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.display_name') }}">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block text-danger">{{ $errors->first('display_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="description">{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.label.description') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea id="description" name="description" class="form-control" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'role.form.placeholder.description') }}">{{ get_option('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block text-danger">{{ $errors->first('description')}}</span>
                                    @endif
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
                        {{ render_grid($columns, $results, $total) }}
                    </div>
                    <div class="panel-footer">
                        @if($total < get_option('default-pagination'))
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="#"><span class="sr-only">(current)</span>1</a></li>
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        @else
                            <div class="pull-right">{{ $results->render() }}</div>
                        @endif
                        <div class="pull-left"><em>Showing {{($results->currentpage()-1)*$results->perpage()+1}} to {{(($results->currentpage()-1)*$results->perpage())+$results->count()}} of {{$results->total()}} Items</em></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection