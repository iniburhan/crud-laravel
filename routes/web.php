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

// Products Routes
Route::get('products', [App\Http\Controllers\Crud\Products\ProductController::class, 'index']);
Route::get('create-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'create']);
Route::post('store-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'store']);
Route::get('show-products/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'show']);
Route::get('edit-products/{id}', [App\Http\Controllers\Crud\Products\ProductController::class, 'edit']);
Route::post('update-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'update']);
Route::post('delete-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'destroy']);
Route::post('restore-products', [App\Http\Controllers\Crud\Products\ProductController::class, 'restore']);

// Suppliers Routes
Route::get('suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'index']);
Route::get('create-suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'create']);
Route::post('store-suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'store']);
Route::get('show-suppliers/{id}', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'show']);
Route::get('edit-suppliers/{id}', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'edit']);
Route::post('update-suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'update']);
Route::post('delete-suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'destroy']);
Route::post('restore-suppliers', [App\Http\Controllers\Crud\Suppliers\SupplierController::class, 'restore']);

// Customer Routes
Route::get('customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'index']);
Route::get('create-customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'create']);
Route::post('store-customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'store']);
Route::get('show-customers/{id}', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'show']);
Route::get('edit-customers/{id}', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'edit']);
Route::post('update-customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'update']);
Route::post('delete-customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'destroy']);
Route::post('restore-customers', [App\Http\Controllers\Crud\Customers\CustomerController::class, 'restore']);

// Transaction Routes
Route::get('transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'index']);
Route::get('create-transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'create']);
Route::post('store-transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'store']);
Route::get('show-transactions/{id}', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'show']);
Route::get('edit-transactions/{id}', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'edit']);
Route::post('update-transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'update']);
Route::post('delete-transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'destroy']);
Route::post('restore-transactions', [App\Http\Controllers\Crud\Transactions\TransactionController::class, 'restore']);

// Jquery Get data
Route::get('product-selects', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'index']);
Route::get('get-product-selects', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'getProduct']);
Route::get('get-product-lists', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'getProductList']);
Route::get('get-supplier-details', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'getSupplierDetail']);
Route::get('get-product-details', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'getProductDetail']);

// dummy jquery
Route::get('jquery-dummy', [App\Http\Controllers\Crud\Products\ProductSelectController::class, 'index']);
