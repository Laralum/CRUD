@extends('laralum::layouts.master')
@section('icon', 'ion-stats-bars')
@section('title', __('laralum_CRUD::general.CRUD'))
@section('subtitle', __('laralum_CRUD::general.CRUD_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.tables.index') }}">@lang('laralum_CRUD::general.CRUD')</a></li>
        <li><span>{{$name}}</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        {{ $name }}
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
                                    @forelse($rows as $key => $row)
                                        <tr>
                                            @foreach ($columns as $column)
                                                <td>{{ $row->$column }}</td>
                                            @endforeach
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    <a href="{{ route('laralum::CRUD.rows.edit', ['table' => $id, 'row' => $key]) }}" class="uk-button uk-button-small uk-button-default">@lang('laralum_CRUD::general.edit')</a>
                                                    <a href="{{ route('laralum::CRUD.rows.destroy.confirm', ['table' => $id, 'row' => $key]) }}" class="uk-button uk-button-small uk-button-danger">@lang('laralum_CRUD::general.delete')</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            @foreach ($columns as $column)
                                                <td>-</td>
                                            @endforeach
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
