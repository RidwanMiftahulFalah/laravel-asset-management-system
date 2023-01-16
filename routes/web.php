<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

Route::fallback(fn () => abort(404));


// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  });

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::resource('users', UserController::class)->only(['index', 'update']);

  Route::resource('categories', CategoryController::class)->except(['show']);

  Route::resource('work_units', WorkUnitController::class)->except(['show']);

  Route::resource('rooms', RoomController::class);

  Route::resource('items', ItemController::class);

  Route::resource('dashboard', DashboardController::class)->only(['index']);

  Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
  Route::resource('transactions', TransactionController::class)->except(['show', 'destroy']);

  Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
  Route::get('/reports/transactions', [ReportController::class, 'createTransactionsPDF'])->name('reports.transactionsPDF');
});

require __DIR__ . '/auth.php';
