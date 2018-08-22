<?php
Route::get('/', function () {
    return view('auth.login');

});
Route::get('/tests', function () {
    return App\Task::find(1)->subtasks;
});
Route::get('/projectmanager', function () {
    return view('projects.project');

});
/**
 * opportunities
 */
Route::get('/opportunities/trashed', 'OpportunityController@trashed');
Route::post('/opportunities/changeStatus', 'OpportunityController@changeStatus')->name('changeStatus');
Route::post('/home/fusion', 'HomeController@fusion');
Route::get('/removeOpportunities/{id}', 'OpportunityConroller@removeOpportunities');
Route::get('/restoreOpportunities/{id}', 'OpportunityController@restoreOpportunities');
Route::get('opportunities/viewall', 'OpportunityController@viewAll');
Route::resource('opportunities', 'OpportunityController');
Route::resource('titles', 'TitleController');
Route::resource('teams', 'TeamController');
Route::resource('projects', 'ProjectsController');
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


Route::resource('opptasks', 'OppsTaskController');
Route::resource('tasks', 'TaskController');
Route::resource('holidays', 'HolidaysController');
Route::resource('subtasks', 'SubtaskController');
Route::get('/subtasks/createtask/{id}/', 'SubtaskController@createtask')->name('subtasks.createtask');

Route::resource('documents', 'DocumentsController');
Route::get('/projects/create/{id}/', 'ProjectsController@createProject')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/projectdetails', 'ProjectsController@projectdetails');


// Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin');
// Route::get('/users/not-admin/{id}', 'UsersController@not_admin')->name('users.not.admin');
// Route::get('/users/trashed','UsersController@trashed');
// Route::get('/users/removeUser/{id}','UsersController@removeUser');
// Route::resource('users','UsersController');
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

// Registered, activated, and is admin routes.
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users'
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::resource('deletes', 'SoftDeletesController');


    // User Profile and Account Routes
    Route::get('profile','PagesController@profile');
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);

Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);
    Route::get('/tasks/completed/{id}','TaskController@completed')->name('task.completed');
