@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.page.title') }}</h3>
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.section.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" action="{{ url('preference/site') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('site-name') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="site-name">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.site-name') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="site-name" name="site-name" class="form-control" value="{{ get_option('site-name') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.site-name') }}">
                                    @if ($errors->has('site-name'))
                                        <span class="help-block text-danger">{{ $errors->first('site-name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tag-line') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="tag-line">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.tag-line') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="tag-line" name="tag-line" class="form-control" value="{{ get_option('tag-line') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.tag-line') }}">
                                    @if ($errors->has('tag-line'))
                                        <span class="help-block text-danger">{{ $errors->first('tag-line')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('footer-text') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="footer-text">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.footer-text') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" id="footer-text" name="footer-text" class="form-control" value="{{ get_option('footer-text') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.footer-text') }}">
                                    @if ($errors->has('footer-text'))
                                        <span class="help-block text-danger">{{ $errors->first('footer-text')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site-logo') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="site-logo">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.site-logo') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="file" id="site-logo" name="site-logo" class="filestyle" data-buttonText="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.site-logo') }}" data-buttonName="btn-default" data-iconName="fa fa-plus">
                                    @if ($errors->has('site-logo'))
                                        <span class="help-block text-danger">{{ $errors->first('site-logo')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site-logo-mobile') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="site-logo-mobile">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.site-logo-mobile') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="file" id="site-logo-mobile" name="site-logo-mobile" class="filestyle" data-buttonText="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.site-logo-mobile') }}" data-buttonName="btn-default" data-iconName="fa fa-plus">
                                    @if ($errors->has('site-logo-mobile'))
                                        <span class="help-block text-danger">{{ $errors->first('site-logo-mobile')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site-lang') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="site-lang">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.site-lang') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <select id="site-lang" name="site-lang" class="form-control">
                                        <option value="en" {{ selected('en', get_option('site-lang')) }}>English</option>
                                    </select>
                                    @if ($errors->has('site-lang'))
                                        <span class="help-block text-danger">{{ $errors->first('site-lang')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('per-page') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="per-page">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.per-page') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="number" id="per-page" name="per-page" class="form-control" value="{{ get_option('per-page') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.per-page') }}">
                                    @if ($errors->has('per-page'))
                                        <span class="help-block text-danger">{{ $errors->first('per-page')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('home-page-limit') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="home-page-limit">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.home-page-limit') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="number" id="home-page-limit" name="home-page-limit" class="form-control" value="{{ get_option('home-page-limit') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.home-page-limit') }}">
                                    @if ($errors->has('home-page-limit'))
                                        <span class="help-block text-danger">{{ $errors->first('home-page-limit')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('default-pagination') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="default-pagination">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.default-pagination') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="number" id="home-page-limit" name="default-pagination" class="form-control" value="{{ get_option('default-pagination') }}" placeholder="{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.default-pagination') }}">
                                    @if ($errors->has('default-pagination'))
                                        <span class="help-block text-danger">{{ $errors->first('default-pagination')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('logo-text') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="logo-text">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.logo-text') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="toggle-custom">
                                        <label class="toggle" data-on="ON" data-off="OFF">
                                            <input type="checkbox" id="logo-text" name="logo-text" value="enable" {{ checked('enable', get_option('logo-text')) }}>
                                            <span class="button-checkbox"></span>
                                        </label>
                                        <label for="logo-text"><em>{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.logo-text') }}</em></label>
                                    </div>
                                    @if ($errors->has('logo-text'))
                                        <span class="help-block text-danger">{{ $errors->first('logo-text')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('carousel') ? ' has-error' : '' }}">
                                <label class="col-lg-2 col-md-3 control-label" for="carousel">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.label.carousel') }}</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="toggle-custom">
                                        <label class="toggle" data-on="ON" data-off="OFF">
                                            <input type="checkbox" id="carousel" name="carousel" value="enable" {{ checked('enable', get_option('carousel')) }}>
                                            <span class="button-checkbox"></span>
                                        </label>
                                        <label for="carousel"><em>{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.placeholder.carousel') }}</em></label>
                                    </div>
                                    @if ($errors->has('carousel'))
                                        <span class="help-block text-danger">{{ $errors->first('carousel')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ trans('backend'.DIRECTORY_SEPARATOR.'preference.form.button.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection