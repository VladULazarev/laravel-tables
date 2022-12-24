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

    Route::controller(CustomerController::class)->group(function () {

                # Find records by 'search' data (typing in the 'Search' field)
        Route::post('/customers/search', 'searchRecords')->name('find-customers');

        # Show searching results by page (click a 'page' link)
        Route::get('/customers/search', 'getRecordsByClickingPageLinks');

        # Show all records
        Route::get('/customers', 'index')->name('customers.index');

        # Store a new record
        Route::post('/customers', 'store' )->name('store-customer');

        # Show the view to create a new record
        Route::get('/customers/create', 'create')->name('customers.create');

        # Show a record
        Route::get('/customers/{data}', 'show')->name('customers.show');

        # Show the view to edit a record
        Route::get('/customers/{data}/edit', 'edit')->name('customers.edit');

        # Update a record
        Route::put('/customers/{data}', 'update')->name('update-customer');

        # Show the view to delete a record
        Route::get('/customers/{data}/destroy', 'destroy')->name('customers.destroy');

        # Delete a record
        Route::delete('/customers/{data}', 'delete')->name('delete-customer');
    });

// ------------------------------------------------------------------ Products

    Route::controller(ProductController::class)->group(function () {

        # Show all orders by a current 'customer'
        Route::get('/orders/customer/{data}', 'ordersByCustomer')->name('orders-by-customer.index');

        # Find records by 'search' data (typing in the 'Search' field)
        Route::post('/products/search', 'searchRecords');

        # Show searching results by page (click a 'page' link)
        Route::get('/products/search', 'getRecordsByClickingPageLinks');

        # Show all records
        Route::get('/products', 'index')->name('products.index');

        # Store a new record
        Route::post('/products', 'store')->name('store-products');

        # Show the view to create a new record
        Route::get('/products/create', 'create')->name('products.create');

        # Show a record
        Route::get('/products/{data}', 'show')->name('products.show');

        # Show the view to edit a record
        Route::get('/products/{data}/edit', 'edit')->name('products.edit');

        # Update a record
        Route::put('/products/{data}', 'update')->name('update-products');

        # Show the view to delete a record
        Route::get('/products/{data}/destroy', 'destroy')->name('products.destroy');

        # Delete a record
        Route::delete('/products/{data}', 'delete')->name('delete-products');
    });

// -------------------------------------------------------------------- Orders

    Route::controller(OrderController::class)->group(function () {

        # Find records by 'search' data (typing in the 'Search' field)
        Route::post('/orders/search', 'searchRecords');

        # Show searching results by page (click a 'page' link)
        Route::get('/orders/search', 'getRecordsByClickingPageLinks');

        # Show all records
        Route::get('/orders', 'index')->name('orders.index');

        # Store a new record
        Route::post('/orders', 'store')->name('store-orders');

        # Show the view to create a new record
        Route::get('/orders/create', 'create')->name('orders.create');

        # Show a record
        Route::get('/orders/{data}', 'show')->name('orders.show');

        # Show the view to edit a record
        Route::get('/orders/{data}/edit', 'edit')->name('orders.edit');

        # Update a record
        Route::put('/orders/{data}', 'update')->name('update-orders');

        # Show the view to delete a record
        Route::get('/orders/{data}/destroy', 'destroy')->name('orders.destroy');

        # Delete a record
        Route::delete('/orders/{data}', 'delete')->name('delete-orders');
    });

// ---------------------------------------------------------------- Categories

    Route::controller(CategoryController::class)->group(function () {

        # Find records by 'search' data (typing in the 'Search' field)
        Route::post('/categories/search', 'searchRecords')->name('find-categories');

        # Show searching results by page (click a 'pager' link)
        Route::get('/categories/search', 'getRecordsByClickingPageLinks');

        # Show all records
        Route::get('/categories', 'index')->name('categories.index');

        # Store a new record
        Route::post('/categories', 'store')->name('store-category');

        # Show the view to create a new record
        Route::get('/categories/create', 'create')->name('categories.create');

        # Show a record
        Route::get('/categories/{data}', 'show')->name('categories.show');

        # Show the view to edit a record
        Route::get('/categories/{data}/edit', 'edit')->name('categories.edit');

        # Update a record
        Route::put('/categories/{data}', 'update')->name('update-category');

        # Show the view to delete a record
        Route::get('/categories/{data}/destroy', 'destroy')->name('categories.destroy');

        # Delete a record
        Route::delete('/categories/{data}', 'delete')->name('delete-category');
    });

// --------------------------------------------------------- Set session values

    Route::post('/set-session', [SessionController::class, 'setSession' ]);

}); # end Admin only

require __DIR__.'/auth.php';
