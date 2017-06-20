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
// ETO IZ VETKI HOTFIX
Route::group(['middleware' => ['web']], function () {
	// Route::auth();
	
	Route::get('/', 'MainController@home');

	Route::post('/login', 'NewAuthController@postLogin');
	
	Route::get('/logout', 'NewAuthController@logout');
 	
 	
	Route::group(['middleware' => ['auth']], function() {
		// 
		Route::get('/admin', function() {
			if (\Auth::user()) {
				$user = \App\User::with('roles')->find(\Auth::user()->id);
				return ($user);
			} else {
				return \Response::json(['flash' => 'ne user admin']);
			};
		});
	});
	// 
	Route::post('/posts', 'MainController@addPost');
	Route::post('/posts/{id}', 'MainController@updatePost');
	Route::post('/users', 'MainController@createUser');
	
	Route::post('/register', 'NewAuthController@create');
	Route::get('/register/verify/{confirmation_code}',  'NewAuthController@verify');

	// API ROUTES ==================================  
	Route::group(['middleware' => ['auth'], 'prefix' => 'api/'], function() {
		Route::get('/currentuser', 'MainController@getCurrentUser');
		Route::get('/users/{id}', 'MainController@getUser');
		Route::get('/users', 'MainController@getUsers');
		Route::get('/roles', 'MainController@getRoles');
		Route::group(['midleware' => 'admin'], function() {
			
		});

	});
	Route::group(['prefix' => 'api/'], function() {
	Route::get('/auth', 'NewAuthController@isAuth');
	    // this ensures that a user can't access api/create or api/edit when there's nothing there
	    Route::resource('/posts', 'MainController', ['only' => ['index', 'show']]);
	  
	});	

});