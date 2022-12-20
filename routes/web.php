<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;

# Clear all for debugging
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cache cleared";
});

Route::get('/', function () { return view('layouts.layout'); });

// ---------------------------------------------------------------- Admin only
Route::middleware('admin')->group(function () {

// ----------------------------------------------------------------- Customers

    # Find records by 'search' data (typing in the 'Search' field)
    Route::post('/customers/search', [
      CustomerController::class, 'searchRecords' ])->name('find-customers');

    # Show searching results by page (click a 'page' link)
    Route::get('/customers/search', [
      CustomerController::class, 'getRecordsByClickingPageLinks' ]);

    # Show all records
    Route::get('/customers', [
      CustomerController::class, 'index' ])->name('customers.index');

    # Store a new record
    Route::post('/customers', [
      CustomerController::class, 'store' ])->name('store-customer');

    # Show the view to create a new record
    Route::get('/customers/create', [
      CustomerController::class, 'create' ])->name('customers.create');

    # Show a record
    Route::get('/customers/{data}', [
      CustomerController::class, 'show' ])->name('customers.show');

    # Show the view to edit a record
    Route::get('/customers/{data}/edit', [
      CustomerController::class, 'edit' ])->name('customers.edit');

    # Update a record
    Route::put('/customers/{data}', [
      CustomerController::class, 'update' ])->name('update-customer');

    # Show the view to delete a record
    Route::get('/customers/{data}/destroy', [
      CustomerController::class, 'destroy' ])->name('customers.destroy');

    # Delete a record
    Route::delete('/customers/{data}', [
      CustomerController::class, 'delete' ])->name('delete-customer');


// ------------------------------------------------------------------ Products

    # Show all orders by a current 'customer'
    Route::get('/orders/customer/{data}', [
      OrderController::class, 'ordersByCustomer' ])->name('orders-by-customer.index');

    # Find records by 'search' data (typing in the 'Search' field)
    Route::post('/products/search', [
      ProductController::class, 'searchRecords' ]);

    # Show searching results by page (click a 'page' link)
    Route::get('/products/search', [
      ProductController::class, 'getRecordsByClickingPageLinks' ]);

    # Show all records
    Route::get('/products', [
      ProductController::class, 'index' ])->name('products.index');

    # Store a new record
    Route::post('/products', [
      ProductController::class, 'store' ])->name('store-products');

    # Show the view to create a new record
    Route::get('/products/create', [
      ProductController::class, 'create' ])->name('products.create');

    # Show a record
    Route::get('/products/{data}', [
      ProductController::class, 'show' ])->name('products.show');

    # Show the view to edit a record
    Route::get('/products/{data}/edit', [
      ProductController::class, 'edit' ])->name('products.edit');

    # Update a record
    Route::put('/products/{data}', [
      ProductController::class, 'update' ])->name('update-products');

    # Show the view to delete a record
    Route::get('/products/{data}/destroy', [
      ProductController::class, 'destroy' ])->name('products.destroy');

    # Delete a record
    Route::delete('/products/{data}', [
      ProductController::class, 'delete' ])->name('delete-products');


// -------------------------------------------------------------------- Orders

    # Find records by 'search' data (typing in the 'Search' field)
    Route::post('/orders/search', [
      OrderController::class, 'searchRecords' ]);

    # Show searching results by page (click a 'page' link)
    Route::get('/orders/search', [
      OrderController::class, 'getRecordsByClickingPageLinks' ]);

    # Show all records
    Route::get('/orders', [
      OrderController::class, 'index' ])->name('orders.index');

    # Store a new record
    Route::post('/orders', [
      OrderController::class, 'store' ])->name('store-orders');

    # Show the view to create a new record
    Route::get('/orders/create', [
      OrderController::class, 'create' ])->name('orders.create');

    # Show a record
    Route::get('/orders/{data}', [
      OrderController::class, 'show' ])->name('orders.show');

    # Show the view to edit a record
    Route::get('/orders/{data}/edit', [
      OrderController::class, 'edit' ])->name('orders.edit');

    # Update a record
    Route::put('/orders/{data}', [
      OrderController::class, 'update' ])->name('update-orders');

    # Show the view to delete a record
    Route::get('/orders/{data}/destroy', [
      OrderController::class, 'destroy' ])->name('orders.destroy');

    # Delete a record
    Route::delete('/orders/{data}', [
      OrderController::class, 'delete' ])->name('delete-orders');


// ---------------------------------------------------------------- Categories

    # Find records by 'search' data (typing in the 'Search' field)
    Route::post('/categories/search', [
      CategoryController::class, 'searchRecords' ])->name('find-categories');

    # Show searching results by page (click a 'pager' link)
    Route::get('/categories/search', [
      CategoryController::class, 'getRecordsByClickingPageLinks' ]);

    # Show all records
    Route::get('/categories', [
      CategoryController::class, 'index' ])->name('categories.index');

    # Store a new record
    Route::post('/categories', [
      CategoryController::class, 'store' ])->name('store-category');

    # Show the view to create a new record
    Route::get('/categories/create', [
      CategoryController::class, 'create' ])->name('categories.create');

    # Show a record
    Route::get('/categories/{data}', [
      CategoryController::class, 'show' ])->name('categories.show');

    # Show the view to edit a record
    Route::get('/categories/{data}/edit', [
      CategoryController::class, 'edit' ])->name('categories.edit');

    # Update a record
    Route::put('/categories/{data}', [
      CategoryController::class, 'update' ])->name('update-category');

    # Show the view to delete a record
    Route::get('/categories/{data}/destroy', [
      CategoryController::class, 'destroy' ])->name('categories.destroy');

    # Delete a record
    Route::delete('/categories/{data}', [
      CategoryController::class, 'delete' ])->name('delete-category');

// --------------------------------------------------------- Set session values

    Route::post('/set-session', [
      SessionController::class, 'setSession' ]);

}); # end Admin only

require __DIR__.'/auth.php';
