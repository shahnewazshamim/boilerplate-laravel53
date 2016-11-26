@extends('layouts.backend.app')

@section('content')

    <div class="contentwrapper">
        <div class="heading">
            <h3>{{ trans('backend\\preference.page.title') }}</h3>
        </div>
        {{ $footer->value }}
    </div>

@endsection