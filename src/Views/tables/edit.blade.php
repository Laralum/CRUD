@extends('laralum::layouts.master')
@section('icon', 'ion-edit')
@section('title', __('laralum_CRUD::general.edit_table'))
@section('subtitle', __('laralum_CRUD::general.edit_table_desc', ['id' => $id]))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.tables.index') }}">@lang('laralum_CRUD::general.tables_list')</a></li>
        <li><span>@lang('laralum_CRUD::general.edit_table')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        {{ __('laralum_CRUD::general.edit_table') }}
                    </div>
                    <div class="uk-card-body">
                        <form class="uk-form-stacked" method="POST" action="{{ route('laralum::CRUD.tables.update', ['id' => $id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <fieldset class="uk-fieldset">


                                <div class="uk-margin">
                                    <label class="uk-form-label">@lang('laralum_CRUD::general.name')</label>
                                    <div class="uk-form-controls">
                                        <input value="{{ old('name', $name) }}" name="name" class="uk-input" type="text" placeholder="@lang('laralum_CRUD::general.name')">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                <a href="{{ route('laralum::CRUD.tables.index') }}" class="uk-button uk-button-default uk-align-left">@lang('laralum_CRUD::general.cancel')</a>
                                    <button type="submit" class="uk-button uk-button-primary uk-align-right">
                                        <span class="ion-forward"></span>&nbsp; {{ __('laralum_CRUD::general.edit_table') }}
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
        </div>
    </div>
@endsection
