@extends('laralum::layouts.master')
@section('icon', 'ion-clipboard')
@section('title', $table)
@section('subtitle', __('laralum_CRUD::general.rows_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.index') }}">@lang('laralum_CRUD::general.tables')</a></li>
        <li><span>{{ $table }}</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('laralum_CRUD::general.tables')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        @foreach ($columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        <th>@lang('laralum_CRUD::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rows as $row)
                                        <tr>
                                            @foreach ($columns as $column)
                                                <td>{{ $row->$column }}</td>
                                            @endforeach
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    <a class="uk-button uk-button-default uk-button-small" href="{{ route('laralum::CRUD.row.view', ['table' => $table, 'key' => $row->getKey()]) }}">
                                                        @lang('laralum_CRUD::general.view')
                                                    </a>
                                                    <a class="uk-button uk-button-default uk-button-small" href="{{ route('laralum::CRUD.row.edit', ['table' => $table, 'key' => $row->getKey()]) }}">
                                                        @lang('laralum_CRUD::general.edit')
                                                    </a>
                                                    <a class="uk-button uk-button-danger uk-button-small" href="{{ route('laralum::CRUD.row.delete', ['table' => $table, 'key' => $row->getKey()]) }}">
                                                        @lang('laralum_CRUD::general.delete')
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            @foreach ($columns as $column)
                                                <td>-</td>
                                            @endforeach
                                            <td>-</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
