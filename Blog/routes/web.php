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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::post('/subscribe', function(){
	$email = request('email');
	Newsletter::subscribe($email);
	Session::flash('subscribe', 'Successfully subscribed');
	return redirect()->back();
});

Route::get('/', [
	'uses'	=> 'FrontEndController@index',
	'as'	=> 'index'
]);

Route::get('/post/{slug}', [
	'uses' 	=> 'FrontEndController@singlePost',
	'as'	=> 'post.single'
]);

Route::get('/category/{id}', [
	'uses'	=> 'FrontEndController@category',
	'as'	=> 'category.single'
]);

Route::get('/tag/{id}', [
	'uses'	=> 'FrontEndController@tag',
	'as'	=> 'tag.single'
]);

Route::get('/results', function(){
	$posts = \App\Post::where('title', 'like', '%'.request('query').'%')->get();

	return view('results')->with('posts', $posts)
							->with('title', 'Search result :'.request('query'))
                            ->with('settings', \App\Settings::first())
                            ->with('categories', \App\Category::all())
                            ->with('query', request('query'))
                            ->with('tags', \App\Tag::all())
							;


});

//inject password
Route::get('/encrypt/{pass}', function($pass) {
	return Hash::make($pass);
});
	

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('/test', function(){
		//return App\Category::find(1)->posts;
		//return App\Post::find(1)->category;
		return App\Tag::find(2)->posts;
	});

	Route::get('/dashboard', [
		'uses' 	=> 'HomeController@index',
		'as'	=> 'home'
	]);

	Route::get('/posts', [
		'uses'	=> 'PostController@index',
		'as'	=> 'posts'
	]);

	Route::get('/post/create', [
		'uses'	=> 'PostController@create',
		'as'	=> 'post.create'
	]);

	Route::post('/post/store', [
		'uses'	=> 'PostController@store',
		'as'	=> 'post.store'

	]);

	Route::get('/post/edit/{id}', [
		'uses'	=> 'PostController@edit',
		'as'	=> 'post.edit'
	]);

	Route::post('/post/update/{id}', [
		'uses'	=> 'PostController@update',
		'as'	=> 'post.update'
	]);

	Route::get('/post/delete/{id}', [
		'uses'	=> 'PostController@destroy',
		'as'	=> 'post.delete'
	]);

	Route::get('/post/trashed', [
		'uses'	=> 'PostController@trashed',
		'as'	=> 'post.trashed'
	]);

	Route::get('/post/kill/{id}', [
		'uses'	=> 'PostController@kill',
		'as'	=> 'post.kill'
	]);

	Route::get('/post/restore/{id}', [
		'uses'	=> 'PostController@edit',
		'as'	=> 'post.restore'
	]);


	Route::get('/categories', [
		'uses'	=> 'CategoriesController@index',
		'as'	=> 'categories'
	]);

	Route::get('/category/create', [
		'uses'	=> 'CategoriesController@create',
		'as'	=> 'category.create'
	]);

	Route::post('/category/store', [
		'uses'	=> 'CategoriesController@store',
		'as'	=> 'category.store'
	]);

	Route::get('/category/edit/{id}', [
		'uses'	=> 'CategoriesController@edit',
		'as'	=> 'category.edit'
	]);

	Route::post('/category/update/{id}', [
		'uses'	=> 'CategoriesController@update',
		'as'	=> 'category.update'
	]);

	Route::get('/category/delete/{id}', [
		'uses'	=> 'CategoriesController@destroy',
		'as'	=> 'category.delete'
	]);

	//tags
	Route::get('/tags', [
		'uses'	=> 'TagsController@index',
		'as'	=> 'tags'
	]);

	Route::get('/tag/create', [
		'uses'	=> 'TagsController@create',
		'as'	=> 'tag.create'
	]);

	Route::post('/tag/store', [
		'uses'	=> 'TagsController@store',
		'as'	=> 'tag.store'
	]);

	Route::get('/tag/edit/{id}', [
		'uses'	=> 'TagsController@edit',
		'as'	=> 'tag.edit'
	]);

	Route::post('/tag/update/{id}', [
		'uses'	=> 'TagsController@update',
		'as'	=> 'tag.update'
	]);

	Route::get('/tag/delete/{id}', [
		'uses'	=> 'TagsController@destroy',
		'as'	=> 'tag.delete'
	]);

	////users
	Route::get('/users', [
		'uses'	=> 'UsersController@index',
		'as'	=> 'users'
	]);

	Route::get('/user/create', [
		'uses'	=> 'UsersController@create',
		'as'	=> 'user.create'
	]);

	Route::post('/user/store', [
		'uses'	=> 'UsersController@store',
		'as'	=> 'user.store'
	]);

	Route::get('/user/admin/{id}', [
		'uses'	=> 'UsersController@admin',
		'as'	=> 'user.admin'
	]);

	Route::get('/user/not-admin/{id}', [
		'uses'	=> 'UsersController@not_admin',
		'as'	=> 'user.not-admin'
	]);

	Route::get('/user/edit/{id}', [
		'uses'	=> 'UsersController@edit',
		'as'	=> 'user.edit'
	]);

	Route::get('/user/profile', [
		'uses'	=> 'ProfilesController@index',
		'as'	=> 'user.profile'
	]);

	Route::post('/user/profile/update', [
		'uses'	=> 'ProfilesController@update',
		'as'	=> 'user.profile.update'
	]);

	Route::post('/user/update/{id}', [
		'uses'	=> 'UsersController@update',
		'as'	=> 'user.update'
	]);

	Route::get('/user/delete/{id}', [
		'uses'	=> 'UsersController@destroy',
		'as'	=> 'user.delete'
	]);

	//settings page
	Route::get('/settings', [
		'uses'	=> 'SettingsController@index',
		'as'	=> 'settings'
	]);	

	Route::post('/settings/update', [
		'uses'	=> 'SettingsController@update',
		'as'	=> 'settings.update'
	]);
	

});

