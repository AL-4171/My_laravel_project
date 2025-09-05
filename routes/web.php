<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('posts', PostController::class)->except(['index']);
Route::post('posts/{post}/comments', [CommentController::class,'store'])->name('comments.store');
Route::get('comments/{comment}/edit', [CommentController::class,'edit'])->name('comments.edit');
Route::put('comments/{comment}', [CommentController::class,'update'])->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class,'destroy'])->name('comments.destroy');

Route::get('profile/{id}', [ProfileController::class,'show'])->name('profile.show');
Route::get('profile/{id}/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::put('profile/{id}', [ProfileController::class,'update'])->name('profile.update');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::post('/posts/{id}/delete',[AdminController::class,'deletePost']);
    Route::post('/users/{id}/toggle-admin',[AdminController::class,'toggleAdmin']);
});



Route::get('likes', [\App\Http\Controllers\LikeController::class,'index'])->name('likes.index');
Route::post('posts/{post}/like', [\App\Http\Controllers\LikeController::class,'store'])->name('posts.like');
Route::delete('likes/{id}', [\App\Http\Controllers\LikeController::class,'destroy'])->name('likes.destroy');


Route::get('friends', [\App\Http\Controllers\FriendshipController::class,'index'])->name('friends.index');
Route::post('friends/{id}/send', [\App\Http\Controllers\FriendshipController::class,'store'])->name('friends.send');
Route::post('friends/{id}/accept', [\App\Http\Controllers\FriendshipController::class,'accept'])->name('friends.accept');
Route::post('friends/{id}/reject', [\App\Http\Controllers\FriendshipController::class,'reject'])->name('friends.reject');
Route::delete('friends/{id}/delete', [\App\Http\Controllers\FriendshipController::class,'destroy'])->name('friends.delete');


Route::resource('users', \App\Http\Controllers\UserController::class);


Route::get('settings', [\App\Http\Controllers\SettingsController::class,'edit'])->name('settings.edit');
Route::put('settings', [\App\Http\Controllers\SettingsController::class,'update'])->name('settings.update');


Route::get('notifications', [\App\Http\Controllers\NotificationController::class,'index'])->name('notifications.index');
Route::post('notifications/{id}/read', [\App\Http\Controllers\NotificationController::class,'markRead'])->name('notifications.read');


Route::prefix('api')->group(function(){
    Route::get('posts', function(){ return response()->json(['message'=>'API posts placeholder']); });
    Route::get('users', function(){ return response()->json(['message'=>'API users placeholder']); });
});
