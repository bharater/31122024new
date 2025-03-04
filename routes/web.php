<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Auth::routes();

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('search', 'searchProducts');
    Route::get('/about-us', 'aboutUs');
    Route::get('/contact-us', 'contactUs');
    Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store'); // Added route for contact form submission
});

Route::middleware(['auth'])->group(function(){
    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{orderId}', [OrderController::class, 'show']);
    Route::get('profile', [UserController::class, 'index']);
    Route::post('profile', [UserController::class, 'updateUserDetails']);
    Route::get('change-password', [UserController::class, 'passwordCreate']);
    Route::post('change-password', [UserController::class, 'changePassword']);
});

Route::get('thank-you', [FrontendController::class, 'thankyou']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('settings', [SettingController::class, 'index']);
    Route::post('settings', [SettingController::class, 'store']);

    Route::get('/settings/aboutus', [FormsController::class, 'edit']);
    Route::put('/settings/update', [FormsController::class, 'update']);

    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    // Route::controller(ColorController::class)->group(function () {
    //     Route::get('/colors', 'index');
    //     Route::get('/colors/create', 'create');
    //     Route::post('/colors/create', 'store');
    //     Route::get('/colors/{color}/edit', 'edit');
    //     Route::put('/colors/{color_id}', 'update');
    //     Route::get('/colors/{color_id}/delete', 'destroy');
    // });

    


    
    Route::controller(ProductVariationController::class)->group(function () {
        Route::get('/variations', 'index')->name('variations.index');
        Route::get('/variations/create', 'create')->name('variations.create');
        Route::post('/variations/store', 'store')->name('variations.store');
        Route::get('/variations/{variation}/edit', 'edit')->name('variations.edit');
        Route::put('/variations/{variation_id}', 'update')->name('variations.update');
        Route::get('/variations/{variation_id}/delete', 'destroy')->name('variations.destroy');
    });

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    });

    Route::controller(AdminUserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}edit', 'edit');
        Route::put('users/{user_id}', 'update');
    });

    Route::controller(AdminUserController::class)->group(function () {
        Route::get('users', 'index');
        Route::get('users/create', 'create');
        Route::post('users', 'store');
        Route::get('users/{user_id}/edit', 'edit');
        Route::put('users/{user_id}', 'update');
        Route::get('users/{user_id}/delete', 'destroy');
    });

    // Added route for viewing contact submissions in the admin panel
    Route::get('contact-submissions', [ContactController::class, 'index'])->name('admin.contact.index');
});
