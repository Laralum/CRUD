@extends('laralum::layouts.master')
@section('icon', 'ion-clipboard')
@section('title', $table)
@section('subtitle', __('laralum_CRUD::general.rows_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.index') }}">@lang('laralum_CRUD::general.tables')</a></li>
        <li><a href="{{ route('laralum::CRUD.row.index', ['table' => $table]) }}">{{ $table }}</a></li>
        <li><span>@lang('laralum_CRUD::general.edit') #{{ $row->getKey() }}</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-body">
                        <form action="{{ route('laralum::CRUD.row.update', ['table' => $table, 'key' => $row->getKey()]) }}" class="uk-form-stacked" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            :)
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
        </div>
    </div>
@endsection
