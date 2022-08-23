<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\WishlistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Livewire\Admin\Brand\Index;
use App\Http\Livewire\Admin\Category\CategoryIndex;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Support\Facades\File;
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
//homepage Route

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories', [HomeController::class, 'showCategory'])->name('categories.home');
Route::get('/products/{categorySlug}', [HomeController::class, 'getProducts'])->name('products.home');
Route::get('/products/{categorySlug}/{productSlug}', [HomeController::class, 'viewProducts'])->name('products.view');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

//Login routes
Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

///Registeration routes
Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    ///categories Routes
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{catId}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update', [CategoryController::class, 'update'])->name('update');
        Route::get('/', CategoryIndex::class)->name('index');
        // Route::delete('/destroy', [CategoryController::class, 'destroy'])->name('destroy');

    });
    ///brands routes
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', Index::class)->name('brand.index');
    });
    //Products Routes
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{proId}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/destroy', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/delete/Image/{imageId}', [ProductController::class, 'deleteImage'])->name('image.delete');
        //ajax route
        Route::post('/update/productColor/{product_color_id}', [ProductController::class, 'updateProductColorQty']);
        Route::get('/delete/productColor/{product_color_id}', [ProductController::class, 'deleteProductColorQty']);
   ;
    });

    //Colors Routes
    Route::group(['prefix' => 'color', 'as' => 'color.'], function () {

        Route::controller(ColorController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{colorId}', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
            Route::delete('/delete', 'destroy')->name('destroy');

        });
    });

    //Colors Routes
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {

        Route::controller(SliderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{sliderId}', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
            Route::delete('/delete', 'destroy')->name('destroy');

        });
    });

});
