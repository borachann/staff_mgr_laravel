<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

// Route::group(['middleware' => ['web']], function () {
//     Route::get('staff/search/{key?}', [
//         'as' => 'staff.search',
//         'uses' => 'StaffController@search'
//     ]);
//     Route::resource('staff', 'StaffController');
// });

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'StaffController@index');

    Route::post('upload/file', [
        'as' => 'upload.file',
        'uses' => 'UploadController@file'
    ]);

    Route::post('upload/image', [
        'as' => 'upload.image',
        'uses' => 'UploadController@image'
    ]);

    Route::get('download/{file}', [
        'as' => 'download.file',
        'uses' => function ($file) {
            return response()->download('upload/' . $file);
        }
    ]);

    /* Route::get('download/file/{$file}', function($file) {
    return response()->download('files/' . $file);
    });

    Route::get('download/photo/{$file}', function($file) {
    return response()->download('photos/' . $file);
    });*/

    // Route::get('staff/search/{key?}', [
    //     'as' => 'staff.search',
    //     'uses' => 'StaffController@search'
    // ]);

    Route::get('staff/delete/{key}', [
        'as' => 'staff.delete',
        'uses' => 'StaffController@updateStatus'
    ]);

    Route::get('report', [
        'as' => 'report',
        'uses' => 'ReportController@index'
    ]);

    Route::get('query', [
        'as' => 'query',
        'uses' => 'ReportController@query'
    ]);

    Route::resource('staff', 'StaffController');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

});
