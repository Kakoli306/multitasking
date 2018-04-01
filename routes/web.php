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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'WelcomeController@index1');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/permission', 'AdminController@permission')->name('admin.permission');
    Route::get('/accounts', 'AdminController@accounts')->name('accounts-admin');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/guide', 'ContactController@new')->name('guide');

Route::get('/view/{id}', 'PostController@view');

//Route::get('/user/register/{id}','WelcomeController@registerUser');

Route::group(['prefix'=>'purchase'], function() {
    Route::get('/{id}', 'ContactController@purchase')->name('contact.purchase');

    Route::post('/add', 'ContactController@adding')->name('add-purchase');

    Route::get('/published/{id}', 'ContactController@publishedPurchase')->name('contact.published');
    Route::get('/unpublished/{id}', 'ContactController@unpublishedPurchase')->name('contact.unpublished');
});

Route::group(['prefix'=>'post'], function() {
    Route::get('/add', 'PostController@index')->name('add-post');
    Route::get('/manage', 'PostController@managePost')->name('manage-post');
    Route::post('/new', 'PostController@savePost')->name('new-post');
    Route::post('/edit', 'PostController@editPost')->name('edit-post');
    Route::post('/update', 'PostController@updatePost')->name('update-post');
    Route::post('/delete', 'PostController@deletePost')->name('delete-post');

   // Route::post('/pending', 'PostController@pendingPost')->name('pending-post');
   // Route::post('/accept', 'PostController@acceptPost')->name('accept-post');
   // Route::post('/reject', 'PostController@rejectPost')->name('reject-post');

    Route::get('/pending/{id}', 'PostController@pendingPost')->name('pending-post');
    Route::get('/accept/{id}', 'PostController@acceptPost')->name('accept-post');
    Route::get('/reject/{id}', 'PostController@rejectPost')->name('reject-post');
});