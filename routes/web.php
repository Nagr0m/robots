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

// Route::get('/{name}', function ($name) {
//     return "Hello Laravel, je suis $name";
//     // return view('welcome');
// });

// Route::get('/category/{id}/{slug?}', function ($id, $slug = '') {

// 	$slug = empty($slug)? 'no slug' : $slug;
  	
//   	return "Les robots de la catégorie: $id, slug: $slug";
//     //return view('welcome');
// });

Route::get('/', 'FrontController@index')->name('home');

Route::get('robot/{id}', 'FrontController@showRobot');

Route::get('tag/{id}', 'FrontController@showRobotsByTag');

Route::get('category/{id}', 'FrontController@showRobotsByCat');


// Route::get('/login', 'Admin\LoginController@login');
// Route::post('/login', 'Admin\LoginController@login');
Route::match(['get', 'post'], 'login', 'Admin\LoginController@login')->name('login');
Route::get('logout', 'Admin\LoginController@logout')->name('logout');

//Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('auth');
Route::group(['middleware' => 'auth'], function(){
	Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');

	Route::resource('admin/robot', 'Admin\RobotController');
});

