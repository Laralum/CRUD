<?php

Route::group([
        'middleware' => [
            'web', 'laralum.base', 'laralum.auth',
            'can:access,Laralum\Statistics\Models\View',
        ],
        'prefix' => config('laralum.settings.base_url').'/crud',
        'namespace' => 'Laralum\CRUD\Controllers',
        'as' => 'laralum::CRUD.'
    ], function () {
        Route::get('tables/{table}/delete', 'TableController@confirmDestroy')->name('tables.destroy.confirm');
        Route::resource('tables', 'TableController');
        Route::get('tables/{table}/rows/{id}/delete', 'RowController@confirmDestroy')->name('rows.destroy.confirm');
        Route::resource('tables/{table}/rows', 'RowController');
});
