<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

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
    return view('auth.login');
});

Route::get('/redirect', [RedirectController::class, 'index']);

Route::get('/direktur', [App\Http\Controllers\Direktur\DashboardController::class, 'index']);
Route::get('/manager-operasional', [App\Http\Controllers\Manager\DashboardController::class, 'index']);
Route::get('/manager-keuangan', [App\Http\Controllers\Manager\DashboardController::class, 'index']);
Route::get('/staff-operasional', [App\Http\Controllers\Staff\DashboardController::class, 'index']);
Route::get('/staff-keuangan', [App\Http\Controllers\Staff\DashboardController::class, 'index']);


require __DIR__.'/auth.php';
