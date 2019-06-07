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

Route::get('/', 'PageController@home');

Route::get('/contact', 'PageController@contact');

Route::get('/about', 'PageController@about');

// Route::get('/projects', 'ProjectController@index');

// Route::get('/projects/create', 'ProjectController@create');

// Route::post('/projects', 'ProjectController@store');

Route::resource('projects','ProjectController');

//* resource for routes
/*
  GET /projects (index)
  GET /projects/create (create)
  GET /projects/{project} (show)
  POST /projects (store)
  GET /projects/{project}/edit (edit)
  PATCH /projects/{project} (update)
  DELETE /projects/{project} (destroy)
*/

Route::patch('/tasks/{task}','ProjectTaskController@update');

Route::post('/projects/{project}/task','ProjectTaskController@create');