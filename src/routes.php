<?php

Route::group([

    'prefix' => 'admin/categories',
    'as' => 'admin.categories.',
    'namespace' => 'CodePress\CodeCategory\Controllers',
    'middleware' => ['web']

], function () {

    Route::get('', 'AdminCategoriesController@index')
        ->name('index');

    Route::get('/create', 'AdminCategoriesController@create')
        ->name('create');

    Route::post('/store', 'AdminCategoriesController@store')
        ->name('store');

    Route::get('/{id}/edit/', 'AdminCategoriesController@edit')
        ->name('edit');

    Route::post('/{id}/update', 'AdminCategoriesController@update')
        ->name('update');

    Route::get('/{id}/delete/', 'AdminCategoriesController@delete')
        ->name('delete');

});