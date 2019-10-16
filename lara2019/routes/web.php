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

Auth::routes();

/* Route::get('/', 'Front\MainpageController@index');

Route::get('/logout', function(){
	Auth::logout();
	return redirect('/');
});
*/

//Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
	Route::get('/', 'Admin\DashboardController@index');
	Route::get('/admin', 'Admin\DashboardController@index');
	Route::resource('/categories', 'Admin\CategoriesController');
	Route::resource('/tags', 'Admin\TagsController');
	Route::resource('/products', 'Admin\ProductsController');
    Route::post('/projects/create', 'Admin\ProjectsController@addImageForGallery')->name('projects.addImageForGallery');
    Route::delete('/projects/create/deleteImageGallery/{id}/', 'Admin\ProjectsController@deleteImageGallery')->name('projects.deleteImageGallery');
    Route::delete('/projects/create/deleteClientImage/{id}/', 'Admin\ProjectsController@deleteClientImage')->name('projects.deleteClientImage');
    Route::resource('/projects', 'Admin\ProjectsController');
    Route::delete('/decisions/{id}/edit/deleteImage', 'DecisionsController@deleteImage')->name('decisions.deleteImage');
    Route::resource('/decisions', 'Admin\DecisionsController');
    Route::post('/faqs', 'Admin\FaqsController@removeFaqFile')->name('removeFaqFile');
    Route::resource('/faqs', 'Admin\FaqsController');
    Route::resource('/contacts', 'Admin\ContactsController');
//});


/*Route::group(['middleware' => 'login'], function (){
	Route::get('/login', 'Admin\AuthController@index');
	Route::post('/login', 'Admin\AuthController@login')->name('login');
});*/
