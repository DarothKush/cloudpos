<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'index']);

//create product
Route::post('/products',[ProductController::class, 'store']);

// Edit product page
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

// Update product
Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');

// Delete product
Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

Route::get('/form',[ProductController::class,'viewForm']);
