@extends('laralum::layouts.master')
@section('icon', 'ion-stats-bars')
@section('title', __('laralum_CRUD::general.CRUD'))
@section('subtitle', __('laralum_CRUD::general.CRUD_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><span>@lang('laralum_CRUD::general.tables')</span></li>
    </ul>
@endsection
{{-- @section('content')
@foreach ($tables as )
    {{$table}}
    <a href="{{ route('laralum::CRUD.tables.show', ['table' => $key]) }}">VIEW</a>
    <br>
@endforeach
@endsection --}}
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-5@l uk-width-1-1@m"></div>
            <div class="uk-width-3-5@l uk-width-1-1@m">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('laralum_CRUD::general.tables')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('laralum_CRUD::general.name')</th>
                                        <th>@lang('laralum_CRUD::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tables as $key => $table)
                                        <tr>
                                            <td>{{ $table }}</td>
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    <a class="uk-button uk-button-default uk-button-small" href="{{ route('laralum::CRUD.tables.show', ['id' => $key]) }}">
                                                        @lang('laralum_CRUD::general.view')
                                                    </a>
                                                    <a class="uk-button uk-button-default uk-button-small" href="{{ route('laralum::CRUD.tables.edit', ['id' => $key]) }}">
                                                        @lang('laralum_CRUD::general.edit')
                                                    </a>
                                                    <a class="uk-button uk-button-danger uk-button-small" href="{{ route('laralum::CRUD.tables.destroy.confirm', ['id' => $key]) }}">
                                                        @lang('laralum_CRUD::general.delete')
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-5@l uk-width-1-1@m"></div>
        </div>
    </div>
@endsection
