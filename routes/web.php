<?php

Route::get('/tests', function () {
    return Auth::user()->name;
});
Route::get('/test', function () {
    return App\Leave::find(1)->user;

});
/**
 * opportunities
 */
Route::get('/opportunities/trashed', 'OpportunityController@trashed');
Route::post('opportunities/changeStatus', 'OpportunityController@changeStatus');
Route::get('/removeOpportunities/{id}', 'OpportunityConroller@removeOpportunities');
Route::get('/restoreOpportunities/{id}', 'OpportunityController@restoreOpportunities');
Route::resource('opportunities', 'OpportunityController');


/**
 * contacts
 */
 Route::resource('contacts', 'ContactController')->middleware('check-permission:CEO');
//Route::resource('contacts', 'ContactController');

/**
 * leaves
 */
Route::resource('leaves', 'leavesController');
Route::get('leaves/acceptLeave', 'leavesController@acceptLeave');
Route::get('leaves/reviewLeave', 'leavesController@reviewLeave');
Route::get('leaves/approveLeave', 'leavesController@approveLeave');
Route::get('leaves/rejectLeave/{id}', 'leavesController@rejectLeave');


Route::resource('tasks', 'TasksController');
Route::resource('documents', 'DocumentsController');
Route::get('/projects/create/{id}/', 'ProjectsController@createProject')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/index', 'ProjectsController@index')->name('projects');

Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin');
Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');
Route::get('/users/trashed','UsersController@trashed');
Route::get('/users/removeUser/{id}','UsersController@removeUser');
Route::resource('users','UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
