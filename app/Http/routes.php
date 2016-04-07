<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', function () {
        $blogs = \App\Blog::orderBy('created_at', 'desc')->get();
        return view('frontend.home', array(
            'title' => 'TAG Sports 1',
            'blogs' => $blogs
        ));
    });

    Route::get('/admin', array('as' => 'admin_index', 'uses' => 'HomeController@index', 'middleware' => array('auth', 'role:admin|manager|staff')));

    /**
     * BEGIN Post Routes
     * @author David Varney
     */
    Route::get('/post', array('as' => 'post_index', 'uses' => 'PostController@index', 'middleware' => array('auth', 'permission:can_view_post|is_god')));
    Route::post('/post/create', array('as' => 'post_store', 'uses' => 'PostController@store', 'middleware' => array('auth', 'permission:can_add_post|is_god')));
    Route::get('/post/{post_id}', array('as' => 'post_show', 'uses' => 'PostController@show', 'middleware' => array('auth', 'permission:can_view_post|is_god')));
    Route::get('/post/{post_id}/edit', array('as' => 'post_edit', 'uses' => 'PostController@edit', 'middleware' => array('auth', 'permission:can_edit_post|is_god', 'post.created.by.current.user')));
    Route::put('/post/{post_id}/update', array('as' => 'post_update', 'uses' => 'PostController@update', 'middleware' => array('auth', 'permission:can_edit_post|is_god', 'post.created.by.current.user')));
    Route::delete('/post/{post_id}/delete', array('as' => 'post_destroy', 'uses' => 'PostController@destroy', 'middleware' => array('auth', 'permission:can_delete_post|is_god', 'post.created.by.current.user')));
});
