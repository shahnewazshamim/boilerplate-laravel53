@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend'.DIRECTORY_SEPARATOR.'user.page.title') }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ trans('backend'.DIRECTORY_SEPARATOR.'user.section.title') }}</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        {{ render_grid($columns, $results, url('user')) }}
                    </div>
                    <div class="panel-footer">
                        {{ render_pagination($results) }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection