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

// Route::get('/direktur', [App\Http\Controllers\Direktur\DashboardController::class, 'index'])->middleware('role:DIREKTUR');
// Route::get('/manager-operasional', [App\Http\Controllers\Manager\DashboardController::class, 'index'])->middleware('role:MANAGER_OPS');
// Route::get('/manager-keuangan', [App\Http\Controllers\Manager\DashboardController::class, 'index'])->middleware('role:MANAGER_KEU');
// Route::get('/staff-operasional', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->middleware('role:STAFF_OPS');
// Route::get('/staff-keuangan', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->middleware('role:STAFF_KEU');

Route::group(['prefix' => 'manager-operasional', 'middleware' => 'role:MANAGER_OPS'], function () {
    Route::resource('report', App\Http\Controllers\Manager\ManagerOperasionalController::class)->parameters([
        'report' => 'id']);
    Route::get('/', [App\Http\Controllers\Manager\ManagerOperasionalController::class, 'dashboard']);
    Route::get('/staff-report', [App\Http\Controllers\Manager\ManagerOperasionalController::class, 'staffReport']);
    Route::put('/staff-report/acc/{id}', [App\Http\Controllers\Manager\ManagerOperasionalController::class, 'accStaffReport']);
    Route::put('/staff-report/reject/{id}', [App\Http\Controllers\Manager\ManagerOperasionalController::class, 'rejectStaffReport']);
    Route::get('/{file}', [App\Http\Controllers\Manager\ManagerOperasionalController::class, 'download']);
});

Route::group(['prefix' => 'manager-keuangan', 'middleware' => 'role:MANAGER_KEU'], function () {
    Route::resource('report', App\Http\Controllers\Manager\ManagerKeuanganController::class)->parameters([
        'report' => 'id']);
    Route::get('/', [App\Http\Controllers\Manager\ManagerKeuanganController::class, 'dashboard']);
    Route::get('/staff-report', [App\Http\Controllers\Manager\ManagerKeuanganController::class, 'staffReport']);
    Route::put('/staff-report/acc/{id}', [App\Http\Controllers\Manager\ManagerKeuanganController::class, 'accStaffReport']);
    Route::put('/staff-report/reject/{id}', [App\Http\Controllers\Manager\ManagerKeuanganController::class, 'rejectStaffReport']);
    Route::get('/{file}', [App\Http\Controllers\Manager\ManagerKeuanganController::class, 'download']);
});

Route::group(['prefix' => 'staff-operasional', 'middleware' => 'role:STAFF_OPS'], function () {
    Route::resource('report', App\Http\Controllers\Staff\StaffOperasionalController::class)->parameters([
        'report' => 'id']);
    Route::get('/', [App\Http\Controllers\Staff\StaffOperasionalController::class, 'dashboard']);
    Route::get('/{file}', [App\Http\Controllers\Staff\StaffOperasionalController::class, 'download']);
});

Route::group(['prefix' => 'staff-keuangan', 'middleware' => 'role:STAFF_KEU'], function () {
    Route::resource('report', App\Http\Controllers\Staff\StaffKeuanganController::class)->parameters([
        'report' => 'id']);
    Route::get('/', [App\Http\Controllers\Staff\StaffKeuanganController::class, 'dashboard']);
    Route::get('/{file}', [App\Http\Controllers\Staff\StaffKeuanganController::class, 'download']);
});

Route::group(['prefix' => 'direktur', 'middleware' => 'role:DIREKTUR'], function () {
    Route::get('/', [App\Http\Controllers\Manager\DashboardController::class, 'index']);
    Route::resource('manager-report', App\Http\Controllers\Manager\ReportController::class)->parameters([
        'manager-report' => 'id']);
});



require __DIR__.'/auth.php';
