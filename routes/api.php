<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\Auth\loginController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Auth\loginController::class, 'login']);

// Drewlabs Generated MVC Route Defnitions, Please Do not delete to avoid duplicates route definitions
Route::group( ['middleware' => 'auth:sanctum'],function()  {
// Route::group(function(){
	// Route definitions for categories
	Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index']);
	Route::get('/categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'show']);
	Route::post('/categories', [\App\Http\Controllers\CategoriesController::class, 'store']);
	Route::put('/categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'update']);
	Route::delete('/categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroy']);
	// !End Route definitions for categories

	// Route definitions for messages
	Route::get('/messages', [\App\Http\Controllers\MessagesController::class, 'index']);
	Route::get('/messages/{id}', [\App\Http\Controllers\MessagesController::class, 'show']);
	Route::post('/messages', [\App\Http\Controllers\MessagesController::class, 'store']);
	Route::put('/messages/{id}', [\App\Http\Controllers\MessagesController::class, 'update']);
	Route::delete('/messages/{id}', [\App\Http\Controllers\MessagesController::class, 'destroy']);
	// !End Route definitions for messages

	// Route definitions for posts
	Route::get('/posts', [\App\Http\Controllers\PostsController::class, 'index']);
	Route::get('/posts/{id}', [\App\Http\Controllers\PostsController::class, 'show']);
	Route::post('/posts', [\App\Http\Controllers\PostsController::class, 'store']);
	Route::put('/posts/{id}', [\App\Http\Controllers\PostsController::class, 'update']);
	Route::delete('/posts/{id}', [\App\Http\Controllers\PostsController::class, 'destroy']);
	// !End Route definitions for posts

	// Route definitions for sequelizemeta
	Route::get('/sequelizemeta', [\App\Http\Controllers\SequelizemetaController::class, 'index']);
	Route::get('/sequelizemeta/{id}', [\App\Http\Controllers\SequelizemetaController::class, 'show']);
	Route::post('/sequelizemeta', [\App\Http\Controllers\SequelizemetaController::class, 'store']);
	Route::put('/sequelizemeta/{id}', [\App\Http\Controllers\SequelizemetaController::class, 'update']);
	Route::delete('/sequelizemeta/{id}', [\App\Http\Controllers\SequelizemetaController::class, 'destroy']);
	// !End Route definitions for sequelizemeta

	// Route definitions for subscriptions
	Route::get('/subscriptions', [\App\Http\Controllers\SubscriptionsController::class, 'index']);
	Route::get('/subscriptions/{id}', [\App\Http\Controllers\SubscriptionsController::class, 'show']);
	Route::post('/subscriptions', [\App\Http\Controllers\SubscriptionsController::class, 'store']);
	Route::put('/subscriptions/{id}', [\App\Http\Controllers\SubscriptionsController::class, 'update']);
	Route::delete('/subscriptions/{id}', [\App\Http\Controllers\SubscriptionsController::class, 'destroy']);
	// !End Route definitions for subscriptions
});
// !End Drewlabs Generated MVC Route Defnitions, Please Do not delete to avoid duplicates route definitions
