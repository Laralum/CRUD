@extends('laralum::layouts.master')
@section('icon', 'ion-clipboard')
@section('title', __('laralum_CRUD::general.create'))
@section('subtitle', __('laralum_CRUD::general.rows_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_CRUD::general.home')</a></li>
        <li><a href="{{ route('laralum::CRUD.index') }}">@lang('laralum_CRUD::general.tables')</a></li>
        <li><a href="{{ route('laralum::CRUD.row.index', ['table' => $table]) }}">{{ $table }}</a></li>
        <li><span>@lang('laralum_CRUD::general.create')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-body">
                        <form action="{{ route('laralum::CRUD.row.store', ['table' => $table]) }}" class="uk-form-stacked" method="POST">
                            {{ csrf_field() }}
                            <div class="uk-margin">
                                <div uk-grid class="uk-grid-small">
                                    @foreach ($columns as $column)
                                        @php
                                            $type = \Schema::getColumnType($table, $column);
                                        @endphp
                                        @if ($type == 'integer')

                                        <div class="uk-width-1-1">
                                            <label class="uk-form-label">{{ $column }}</label>
                                            <div class="uk-form-controls">
                                                <input  name="{{ $column }}" class="uk-input" type="number">
                                            </div>
                                        </div>

                                        @elseif ($type == 'decimal')

                                            {{-- Decimal field --}}
                                            <div class="uk-width-1-1">
                                                <label class="uk-form-label">{{ $column }}</label>
                                                <div class="uk-form-controls">
                                                    <input  step="any" name="{{ $column }}" class="uk-input" type="number">
                                                </div>
                                            </div>

                                        @elseif ($type == 'text')

                                            {{-- Textarea field --}}
                                            <div class="uk-width-1-1">
                                                <label class="uk-form-label">{{ $column }}</label>
                                                <div class="uk-form-controls">
                                                    <textarea  name="{{ $column }}" rows="5" class="uk-textarea"></textarea>
                                                </div>
                                            </div>

                                        @elseif ($type == 'boolean')

                                            {{-- Boolean Field --}}
                                            <div class="uk-width-1-1">
                                                <label class="uk-form-label">{{ $column }}</label>
                                                <div class="uk-form-controls">
                                                    <label><input name="{{ $column }}" class="uk-checkbox" type="checkbox">
                                                        {{ $column }}
                                                    </label><br />
                                                </div>
                                            </div>

                                        @else

                                            {{-- Other field types  --}}
                                            <div class="uk-width-1-1">
                                                <label class="uk-form-label">{{ $column }}</label>
                                                <div class="uk-form-controls">
                                                    <input  name="{{ $column }}" class="uk-input" type="text">
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach
                                    <div class="uk-width-1-1">
                                        <button type="submit" class="uk-button uk-button-primary">
                                            <span class="ion-forward"></span>&nbsp; @lang('laralum_CRUD::general.create_row')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
        </div>
    </div>
@endsection
