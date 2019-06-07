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

use App\Repositories\UserRepository;

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

Route::get('/twitter', function(){
  // when Twitter class is resolved here (to an instance), the service provider would already initialized it with an 'api-key'
  dd(app('App\Services\Twitter'));
});

Route::get('/userrepo', function(UserRepository $users){
  dd($users);
});