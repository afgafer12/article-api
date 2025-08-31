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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/article')->controller(\App\Http\Controllers\Api\PostController::class)->group(function () {
    Route::get('/', 'getPosts');
    Route::get('/{id}', 'getPost');
    Route::get('/{limit}/{offset}', 'getPostsPage');
    Route::post('/', 'createPost');
    Route::put('/{id}', 'updatePost');
    Route::patch('/{id}', 'updatePostStatus');
    Route::delete('/{id}', 'deletePost');
});
