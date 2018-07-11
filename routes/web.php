<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return App\User::find(1)->activities;
});
Route::resource('contacts', 'ContactController')->middleware('check-permission:CEO');
Route::resource('opportunities', 'OpportunityController');
Route::resource('tasks', 'TasksController');
Route::resource('documents', 'DocumentsController');
Route::get('/projects/create/{id}/', 'ProjectsController@createProject')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/index', 'ProjectsController@index')->name('projects');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin');
Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
