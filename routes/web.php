<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\ProfileController;
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
  return view('auth.login');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::resource('categories', CategoryController::class);

  Route::resource('work_units', WorkUnitController::class);

  Route::resource('items', ItemController::class);

  Route::resource('rooms', RoomController::class);

  Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
  Route::resource('transactions', TransactionController::class);
});


require __DIR__ . '/auth.php';
