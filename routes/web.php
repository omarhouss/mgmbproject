<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    });
    Route::get('/roleregiter','\App\Http\Controllers\Admin\DashboardController@registred');
    Route::get('/role-edit/{id}','\App\Http\Controllers\Admin\DashboardController@registrededit');
    Route::put('/role-register-update/{id}','\App\Http\Controllers\Admin\DashboardController@registredupdate');
    Route::delete('/role-del/{id}','\App\Http\Controllers\Admin\DashboardController@registreddel');
    Route::get('/add-user','\App\Http\Controllers\Admin\DashboardController@useradd');


    Route::get('/tasks','\App\Http\Controllers\Admin\TasksController@first');
    Route::get('/save-task','\App\Http\Controllers\Admin\TasksController@save');
    Route::get('/tasks/{id}','\App\Http\Controllers\Admin\TasksController@edit');
    Route::put('/task-update/{id}','\App\Http\Controllers\Admin\TasksController@updatetask');
    Route::delete('/task-del/{id}','\App\Http\Controllers\Admin\TasksController@taskdel');

});



