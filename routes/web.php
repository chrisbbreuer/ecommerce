<?php

use App\Actions\AddOrder;
use App\Actions\ShowOrders;
use App\Actions\ShowProducts;
use App\Actions\ShowSuccessOrder;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', ShowProducts::class)->name('products');
    Route::get('/orders', ShowOrders::class)->name('orders');
    Route::get('/order', AddOrder::class)->name('add-order');
    Route::get('/success-order/{id}', ShowSuccessOrder::class)->name('order-success');
});

require __DIR__.'/auth.php';
