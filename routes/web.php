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

Route::get('/', function () {
    return view('welcome');
});
// index
// Route::get('/products', [App\Http\Controllers\Crud\Products\ProductController::class, 'index'])->name('products');
// // create data
// Route::get('/products/create', [App\Http\Controllers\Crud\Products\ProductController::class, 'create'])->name('products.create');
// Route::post('/products/store', [App\Http\Controllers\Crud\Products\ProductController::class, 'store'])->name('products.store');
// // show data
// Route::get('/products/show/{id}', 'App\Http\Controllers\Crud\Products\ProductController@Show')->name('products.show');
// // Route::get('/products/show/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'show'])->name('products.show');
// // update data
// Route::get('/products/edit/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/update/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'update'])->name('products.update');
// // delete data
// Route::get('/products/delete/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'destroy'])->name('products.delete');

// Route::resource('products', App\Http\Controllers\Crud\Products\ProductController::class);

Route::get('products', [App\Http\Controllers\Crud\Products\ProductController::class, 'index']);
Route::get('create-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'create']);
Route::post('store-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'store']);

Route::get('show-products/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'show']);

Route::get('edit-products/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'edit']);
Route::post('update-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'update']);

Route::post('delete-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'destroy']);

Route::post('restore-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'restore']);
