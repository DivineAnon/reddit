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

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/forum', 'HomeController@forum_page')->name('forum');
Route::get('/threads', 'HomeController@thread_page')->name('threads');
Route::get('/popular', 'HomeController@popular_page')->name('popular');
Route::get('/popular/threads/articles', 'HomeController@popular_thread_article_page')->name('popular_thread_article');
Route::get('/popular/threads/images', 'HomeController@popularthread_image_page')->name('popular_thread_image');
Route::get('/popular/threads/videos', 'HomeController@popular_thread_video_page')->name('popular_thread_video');
Route::get('/threads/articles', 'HomeController@thread_article_page')->name('thread_article');
Route::get('/threads/images', 'HomeController@thread_image_page')->name('thread_image');
Route::get('/threads/videos', 'HomeController@thread_video_page')->name('thread_video');
Route::get('/forum/brand/{name}', 'HomeController@brand_page')->name('brand_home');
Route::get('/forum/brand/{name}/{slug}', 'HomeController@gadget_page')->name('gadget_home');
Route::get('/thread/{thread_key}', 'HomeController@thread_detail_page')->name('thread_detail');
Route::get('/p/{name}', 'HomeController@profile_page')->name('profile_page');
//create account
Route::post('/register_account', 'UserController@register_account')->name('register_account');
//search
Route::get('/search', 'HomeController@search')->name('search');
//universal
Route::group(['middleware' => ['auth']], function () {
    //report thread
    Route::post('/spam_report', 'ThreadReportController@spam_report')->name('spam_report');
    Route::post('/inappropriate_report', 'ThreadReportController@inappropriate_report')->name('inappropriate_report');
    Route::post('/other_report', 'ThreadReportController@other_report')->name('other_report');
    //Upvote & Downvote thread
    Route::post('/upvote', 'ThreadController@upvote')->name('upvote');
    Route::post('/downvote', 'ThreadController@downvote')->name('downvote');
    //create thread
    Route::post('/create_thread', 'ThreadController@store')->name('create_thread');
    //Thread Management
    Route::get('/my_threads', 'HomeController@my_threads_page')->name('my_thread');
    Route::post('delete_thread', 'ThreadController@destroy')->name('delete_tread');
    Route::post('hide_thread', 'ThreadController@hide')->name('hide_tread');
});
//admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    //ban thread
    Route::post('/ban_thread', 'ThreadReportController@ban_thread')->name('ban_thread');
    Route::prefix('admin')->group(function () {
        //Manage Brand
        Route::get('manage_brands', 'BrandController@index')->name('brands.index');
        Route::get('manage_brands/add', 'BrandController@create')->name('brands.create');
        Route::post('manage_brands/store', 'BrandController@store')->name('brands.store');
        Route::post('manage_brands/delete/{id}', 'BrandController@destroy')->name('brands.delete');
        Route::get('manage_brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
        Route::post('manage_brands/update/{id}', 'BrandController@update')->name('brands.update');
        //Manage Gadget
        Route::get('manage_gadgets', 'GadgetController@index')->name('gadgets.index');
        Route::get('manage_gadgets/add', 'GadgetController@create')->name('gadgets.create');
        Route::post('manage_gadgets/store', 'GadgetController@store')->name('gadgets.store');
        Route::post('manage_gadgets/delete/{id}', 'GadgetController@destroy')->name('gadgets.delete');
        Route::get('manage_gadgets/edit/{id}', 'GadgetController@edit')->name('gadgets.edit');
        Route::post('manage_gadgets/update/{id}', 'GadgetController@update')->name('gadgets.update');
        //Manage Report
        Route::get('manage_reports', 'ThreadReportController@index')->name('reports.index');
        Route::get('manage_reports/see/{thread_key}', 'ThreadReportController@show')->name('reports.show');
        Route::post('manage_reports/ban/{id}', 'ThreadReportController@ban')->name('reports.ban');
        Route::post('manage_reports/ignore/{id}', 'ThreadReportController@ignore')->name('reports.ignore');
        //Manage User
        Route::get('manage_users', 'UserController@index')->name('users.index');
        Route::get('manage_users/view/{id}', 'UserController@show')->name('users.show');
        Route::post('manage_users/ban/{id}', 'UserController@ban')->name('users.ban');
        Route::post('manage_users/unban/{id}', 'UserController@unban')->name('users.unban');
        //Manage Filter Thread
        Route::get('manage_threads', 'ThreadReportController@index_filter')->name('filter.index');
    });
});
Route::group(['middleware' => ['auth', 'super_admin']], function () {
    Route::get('/super_admin', 'AdminController@super_index')->name('super_admin');
    //Manage Admins
    Route::get('/super_admin/manage_admins', 'AdminController@index_manage')->name('admins.index');
    Route::get('/super_admin/manage_admins/add', 'AdminController@create')->name('admins.create');
    Route::post('/super_admin/manage_admins/store', 'AdminController@store')->name('admins.store');
    Route::post('/super_admin/manage_admins/delete/{id}', 'AdminController@destroy')->name('admins.delete');
    Route::get('/super_admin/manage_admins/edit/{id}', 'AdminController@edit')->name('admins.edit');
    Route::post('/super_admin/manage_admins/update/{id}', 'AdminController@update')->name('admins.update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

