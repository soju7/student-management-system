<?php

Route::get('/students', 'StudentController@index')->name('student.index');
Route::get('/student/create', 'StudentController@create')->name('student.create');
Route::post('/student', 'StudentController@store')->name('student.store');
Route::get('/student/{id}/edit', 'StudentController@edit')->name('student.edit');
Route::put('/student/{id}', 'StudentController@update')->name('student.update');
Route::delete('/student/{id}', 'StudentController@destroy')->name('student.destroy');

