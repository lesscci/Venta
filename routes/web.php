<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProveedorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::resource('proveedores', 'ProveedorController');


Route::get('/proveedores/{id}/editar', 'ProveedorController@edit')->name('proveedores.edit');

Route::put('/proveedores/{id}', 'ProveedorController@update')->name('proveedores.update');


Route::middleware('auth')->group(function () {
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
Route::get('/purchases/{id}', [PurchaseController::class, 'show'])->name('purchases.show');
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchase.index');
Route::post('/purchase', 'PurchaseController@store')->name('purchase.store');

});


