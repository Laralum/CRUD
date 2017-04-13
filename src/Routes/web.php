<?php

Route::group([
        'middleware' => [
            'web', 'laralum.base', 'laralum.auth',
            'can:access,Laralum\CRUD\Models\Table',
        ],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\CRUD\Controllers',
        'as' => 'laralum::CRUD.'
    ], function () {
        Route::get('CRUD', 'CRUDController@tables')->name('index');
        Route::get('CRUD/{table}', 'CRUDController@rows')->name('row.index');
        Route::get('CRUD/{table}/create', 'CRUDController@create')->name('row.create');
        Route::post('CRUD/{table}', 'CRUDController@store')->name('row.store');
        Route::get('CRUD/{table}/{key}', 'CRUDController@show')->name('row.view');
        Route::get('CRUD/{table}/{key}/edit', 'CRUDController@edit')->name('row.edit');
        Route::put('CRUD/{table}/{key}', 'CRUDController@update')->name('row.update');
        Route::get('CRUD/{table}/{key}/delete', 'CRUDController@confirmDelete')->name('row.delete');
        Route::delete('CRUD/{table}/{key}', 'CRUDController@destroy')->name('row.destroy');
});
