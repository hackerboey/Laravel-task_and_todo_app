<?php

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
    return view('welcome');			#get request to load default home page
});


Route::get('/tasks', 'TasksController@index'); #get request to load tasks index page

Route::get('/tasks/new', 'TasksController@new'); #get request to load a new task page

Route::get('/tasks/{task}', 'TasksController@view'); #get request to load task view page

Route::get('/tasks/{task}/edit', 'TasksController@edit'); #get request to load task edit page 

Route::patch('/tasks/{task}', 'TasksController@update'); #path request to update a task

Route::delete('/tasks/{task}', 'TasksController@destroy'); #Delete action on a task  

Route::patch('/tasks/{task}/completed', 'TasksController@completed'); #Mark a task completed

Route::post('/tasks', 'TasksController@save'); #post request to save the entered task from the new page

Route::patch('/todos/{todo}','TasksTodoController@update'); #change status of the todo to checked or unchecked

Route::post('/tasks/{task}/todos','TasksTodoController@store'); #add a new todo to the opened task

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
