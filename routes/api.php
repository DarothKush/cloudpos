<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    //products
    Route::get('products',[ProductController::class, 'index']);
    Route::get('products/{product}',[ProductController::class, 'show']);
    Route::post('products',[ProductController::class, 'store']);
    Route::put('products/{product}',[ProductController::class, 'update']);
    Route::delete('products/{product}',[ProductController::class, 'destroy']);

    //user
    Route::get('users',[UserController::class, 'index']);
    Route::get('users/{user}',[UserController::class, 'show']);
    Route::post('users',[UserController::class, 'store']);
    Route::put('users/{user}',[UserController::class, 'update']);
    Route::delete('users/{user}',[UserController::class, 'destroy']);

    //roles
    Route::get('roles',[RoleController::class, 'index']);
    Route::get('roles/{role}',[RoleController::class, 'show']);
    Route::post('roles',[RoleController::class, 'store']);
    Route::put('roles/{role}',[RoleController::class, 'update']);
    Route::delete('roles/{role}',[RoleController::class, 'destroy']);

    //permission
    Route::get('permissions',[PermissionController::class, 'index']);
    Route::get('permissions/{permission}',[PermissionController::class, 'show']);
    Route::post('permissions',[PermissionController::class, 'store']);
    Route::put('permissions/{permission}',[PermissionController::class, 'update']);
    Route::delete('permissions/{permission}',[PermissionController::class, 'destroy']);
});
