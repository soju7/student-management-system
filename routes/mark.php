<?php

Route::get('/marks', 'MarkController@index')->name('mark.index');
Route::get('/mark/create', 'MarkController@create')->name('mark.create');
Route::post('/mark', 'MarkController@store')->name('mark.store');
Route::get('/mark/{id}/edit', 'MarkController@edit')->name('mark.edit');
Route::put('/mark/{id}', 'MarkController@update')->name('mark.update');
Route::delete('/mark/{id}', 'MarkController@destroy')->name('mark.destroy');