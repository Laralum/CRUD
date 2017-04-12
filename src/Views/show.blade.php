@extends('laralum::layouts.master')
@section('icon', 'ion-clipboard')
@section('title', $table)
@section('subtitle', __('laralum_CRUD::general.rows_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.index') }}">@lang('laralum_CRUD::general.tables')</a></li>
        <li><a href="{{ route('laralum::CRUD.row.index', ['table' => $table]) }}">{{ $table }}</a></li>
        <li><span>#{{ $row->getKey() }}</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-4@l"></div>
            <div class="uk-width-1-1@s uk-width-1-2@l">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-body">

                        <h4>@lang('laralum_CRUD::general.table_data')</h4>
                        <b>@lang('laralum_CRUD::general.table_name'): </b><span> {{ $table }}</span><br />
                        <b>@lang('laralum_CRUD::general.table_rows'): </b><span> {{ count($columns) }}</span><br />

                        <h4>@lang('laralum_CRUD::general.row_data')</h4>
                        @foreach ($columns as $column)
                            <b>{{ $column }}: </b><span> {{ $row->$column }}</span><br />
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-4@l"></div>
        </div>
    </div>
@endsection
