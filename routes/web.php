<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 商品関連
Route::get('/index', [ItemController::class, 'index'])->name('items.index'); // 商品一覧
Route::get('/show/{id}', [ItemController::class, 'show'])->name('items.show'); // 商品詳細

Route::middleware('auth')->group(function () {
    // カート関連
    Route::prefix('cart')->group(function (){
        Route::get('/', [CartController::class, 'index'])->name('cart.index'); // カート一覧
        Route::post('/add', [CartController::class, 'add'])->name('cart.add'); // カートに入れる
        Route::delete('/{id}', [CartController::class, 'softDelete'])->name('cart.softDelete'); // 商品論理削除
    });

    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
