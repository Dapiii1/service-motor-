
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceMotorController;

$modules = [
    'pelanggan',
    'kendaraan',
    'daftar-service',
    'data-service',
    'pembayaran',
];

Route::get('/{module}', [ServiceMotorController::class, 'index'])
    ->whereIn('module', $modules);

Route::post('/{module}', [ServiceMotorController::class, 'store'])
    ->whereIn('module', $modules);

Route::get('/{module}/{id}', [ServiceMotorController::class, 'show'])
    ->whereIn('module', $modules);

Route::put('/{module}/{id}', [ServiceMotorController::class, 'update'])
    ->whereIn('module', $modules);

Route::patch('/{module}/{id}', [ServiceMotorController::class, 'update'])
    ->whereIn('module', $modules);

Route::delete('/{module}/{id}', [ServiceMotorController::class, 'destroy'])
    ->whereIn('module', $modules);
