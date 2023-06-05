<?php

use App\Models\Packages;
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

Route::get('/', function () {
    $packages = Packages::all();
    return view('welcome', [
        "packages" => $packages,
    ]);
});

Auth::routes([
    "register" => false,
    "reset" => false,
    "verify" => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order', [App\Http\Controllers\UserOrderController::class, 'index'])->name('order.index');
Route::post('/order', [App\Http\Controllers\UserOrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [App\Http\Controllers\UserOrderController::class, 'show'])->name('order.show');

Route::resource('/inventorys', App\Http\Controllers\InventoryController::class);
Route::resource('/orders', App\Http\Controllers\OrderController::class);
