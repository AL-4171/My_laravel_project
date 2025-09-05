<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Authentication routes
Auth::routes();

// Home page -> All Posts
Route::get('/', 'PostController@index')->name('home');

// User routes
Route::middleware('auth')->group(function () {

    // Posts
    Route::resource('posts', 'PostController');
    Route::get('myposts', 'PostController@myPosts')->name('posts.myposts');

    // Comments
    Route::post('posts/{post}/comments', 'CommentController@store')->name('comments.store');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

    // Profiles (only logged in user can manage their profile)
    Route::get('myprofile', 'ProfileController@myProfile')->name('profiles.my');
    Route::get('myprofile/edit', 'ProfileController@edit')->name('profiles.edit');
    Route::put('myprofile/update', 'ProfileController@update')->name('profiles.update');

    // Delete Account
    Route::delete('account', 'AccountController@destroy')->name('account.delete');
});

// Admin routes
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
    });
