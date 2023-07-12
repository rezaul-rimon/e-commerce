<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
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
// Frontend route


Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/single', 'single')->name('single');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');

});



// Admin Logout route
Route::get('/adminlogout', [AdminController::class, 'destroy'])->name('admin.logout');

//User Route
Route::get('/showUsers', [UserController::class, 'showUsers'])->name('showUsers');
Route::get('/deleteUsers/{id}', [UserController::class, 'destroy'])->name('deleteUsers');
Route::get('/editUsers/{id}', [UserController::class, 'edit'])->name('editUsers');
Route::post('/updateUsers/{id}', [UserController::class, 'update'])->name('updateUsers');

// Products route group
Route::controller(ProductController::class,)->group(function(){
    Route::get('/product','index')->name('product.index');
    Route::post('/product/add','store')->name('product.add');
    Route::get('/product/manage','show')->name('product.manage');
    Route::get('/product/atoi/{id}','atoi')->name('product.atoi');
    Route::get('/product/itoa/{id}','itoa')->name('product.itoa');
    Route::get('/product/delete/{id}','destroy')->name('product.delete');
    Route::get('/product/edit/{id}','edit')->name('product.edit');
    Route::post('/product/update/{id}','update')->name('product.update');
    Route::get('/singleProduct/{id}','singleProduct')->name('singleProduct');
});


Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
