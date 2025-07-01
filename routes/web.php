<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('authenticate');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('admin.home');

    //create
    Route::get('/admin/equipments/new', [EquipmentController::class, 'create'])->name('equipments.create');
    Route::post('/admin/equipments', [EquipmentController::class, 'store'])->name('equipments.store');

    //retrieve
    Route::get('/admin/equipments', [EquipmentController::class, 'index'])->name('equipments.index');
    Route::get('/admin/equipments/{equipment}', [EquipmentController::class, 'show'])->name('equipments.show');

    //delete
    Route::delete('/admin/equipments/{equipment}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

    //edit
    Route::get('/admin/equipments/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipments.edit');
    Route::put('/admin/equipments/{equipment}', [EquipmentController::class, 'update'])->name('equipments.update');


    //Maintenance Routes

    //create
    Route::get('/admin/equipments/{equipment}/maintenances/new', [MaintenanceController::class, 'create'])
        ->name('maintenances.create');
    Route::post('/admin/equipments/{equipment}/maintenances', [MaintenanceController::class, 'store'])
        ->name('maintenances.store');

    //retrieve
    Route::get('/admin/equipments/{equipment}/maintenances', [MaintenanceController::class, 'index'])
        ->name('maintenances.index');

    //edit
    Route::get('/admin/equipments/{equipment}/maintenances/{maintenance}/edit', [MaintenanceController::class, 'edit'])
        ->name('maintenances.edit');
    Route::put('/admin/equipments/{equipment}/maintenances/{maintenance}', [MaintenanceController::class, 'update'])
        ->name('maintenances.update');

    //delete
    Route::delete('/admin/equipments/{equipment}/maintenances/{maintenance}', [MaintenanceController::class, 'destroy'])
        ->name('maintenances.destroy');
});
