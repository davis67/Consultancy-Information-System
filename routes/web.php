<?php

Route::get('/tests', function () {
    return App\Opportunity::find(2)->users;
});
Route::get('/projectmanager', function () {
    return view('projects.project');

});
/**
 * opportunities
 */
Route::get('/opportunities/trashed', 'OpportunityController@trashed');
Route::post('opportunities/changeStatus', 'OpportunityController@changeStatus');
Route::get('/removeOpportunities/{id}', 'OpportunityConroller@removeOpportunities');
Route::get('/restoreOpportunities/{id}', 'OpportunityController@restoreOpportunities');
Route::get('opportunities/viewall', 'OpportunityController@viewAll');
Route::resource('opportunities', 'OpportunityController');


/**
 * contacts
 */
 //Route::resource('contacts', 'ContactController')->middleware('check-permission:CEO');
Route::resource('contacts', 'ContactController');

/**
 * leaves
 */
Route::resource('leaves', 'leavesController');
Route::get('leaves/acceptLeave', 'leavesController@acceptLeave');
Route::get('leaves/reviewLeave', 'leavesController@reviewLeave');
Route::get('leaves/approveLeave', 'leavesController@approveLeave');
Route::get('leaves/rejectLeave/{id}', 'leavesController@rejectLeave');


Route::resource('tasks', 'OppsTaskController');
Route::resource('documents', 'DocumentsController');
Route::get('/projects/create/{id}/', 'ProjectsController@createProject')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/projectdetails', 'ProjectsController@projectdetails');


Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin');
Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');
Route::get('/users/trashed','UsersController@trashed');
Route::get('/users/removeUser/{id}','UsersController@removeUser');
Route::resource('users','UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('associates', 'AssociatesController');
Route::resource('files', 'FileController');
// Route::get('/files','FileController@index')->name('viewfile');
Route::get('/files/upload','FileController@create')->name('formfile');
// Route::post('/files/upload','FileController@store')->name('uploadfile');
Route::delete('/files/{id}','FileController@destroy')->name('deletefile');
Route::get('/files/download/{id}','FileController@show')->name('downloadfile');
Route::get('/files/email/{id}','FileController@edit')->name('emailfile');
// Route::post('/files/dropzone','FileController@dropzone')->name('dropzone');
// Route::post('/files/uploadfiledata','FileController@uploadfiledata')->name('uploadfiledata');

