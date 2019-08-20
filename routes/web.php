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

// Route::get('/test', function () {
//     return App\User::find(1)-> profile;
// });

// Route::get('/4584636', function () {
//     return App\User::all();
// });

// ! FrountEnd Routes  - - - - >>>  slug routing 

Route::get('/post/{slug}', [
    'uses' => 'FrondEndController@singlePost',
    'as' => 'post.single'
]);

// ! ------>>>>>> Show index pages  
Route::get('/', [
    'uses' => 'FrondEndController@index',
    'as' => 'index'
]);



Route::get('/result', function () {
    $posts = \App\Post::where('title' , 'like' , '%' .  request ('query')  .'%')-> get();

    return view('result')->with('posts' , $posts)
    ->with('title', 'Search results :' . request('query'))
    ->with('setting', \App\Setting::first())
    ->with('categories', \App\Category::take(6)->get())
    ->with('query' , request('query'))
    ->with('about' , \App\Profile::first());   ;
});




Route::get('/category/{id}' , 'FrondEndController@category')->name('category.single');


Auth::routes();


// ! Admins  Routes  - - - -

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {



Route::get('/home', 'HomeController@index')->name('home');
    
Route::resource('posts', 'PostsController');

Route::resource('cat', 'CategoryController');

// Route::get('/cat/delete/{id}', [
//     'uses' => "CategoryController@destroy",
//     'as' => 'cat.delete'
// ]);


// ! Delete category Routes  - - - - 

Route::get('cat/delete/{id}', 'CategoryController@destroy')->name('cat.delete');
// Delete Posts 
Route::get('posts/delete/{id}' ,  'PostsController@destroy')->name('posts.delete');

// ! Retrieve Posts after Delete - - - - 

// Retrieve Posts after Delete
Route::get('/posts/db/trashed' , 'PostsController@trashed')->name('posts.trashed');

// ! Permanent Delete Posts - - - - 
// Permanent Delete Posts 
Route::get('/posts/db/kill/{id}'  , 'PostsController@kill')->name('posts.kill');

// ! Restore Posts  - - - - 
Route::get('/posts/db/restore/{id}' , 'PostsController@restore')->name('posts.restore');
// 
Route::get('/posts/db/restore/{id}' , 'PostsController@restore')->name('posts.restore');

// !  Tags Route  - - - - 
Route::resource('tag', 'TagsController');
Route::get('/tag/db/{id}', 'TagsController@destroy')->name('tag.delete');

// ! Users Routes - - - - 
Route::resource('user', 'UsersController');
Route::get('/user/db/{id}' ,  'UsersController@destroy' )->name('user.delete')->middleware('deleteadmin');
// Route::post('/user/store', [
//     'uses' => 'UsersController@store',
//     'as' => 'user.store'
// ]);

Route::get('user/admin/{id}' , 'UsersController@admin')->name('user.admin')->middleware('admin');
Route::get('user/not_admin/{id}' , 'UsersController@not_admin')->name('user.not.admin')->middleware('notadmin');;


// ! User Profile Routesss 

Route::get('user/database/profile', [
    'uses' => 'ProfileController@index',
    'as' => 'user.profile'
]);

Route::post('/user/databaseupdate/profile/update', [
    'uses' => 'ProfileController@update',
    'as' => 'user.profile.update'
]);


                                //   Todo  Query Builder // 
Route::get('/settings', [
    'uses' => 'SettingsController@index',
    'as' => 'settings'
]);

Route::post('/settings/update', [
    'uses' => 'SettingsController@update',
    'as' => 'settings.update'
]);




});







