
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

Route::redirect('/', '/pelanggan');

Route::get('/{module}', [ServiceMotorController::class, 'index'])
    ->whereIn('module', $modules)
    ->name('crud.index');

Route::get('/{module}/create', [ServiceMotorController::class, 'create'])
    ->whereIn('module', $modules)
    ->name('crud.create');

Route::post('/{module}', [ServiceMotorController::class, 'store'])
    ->whereIn('module', $modules)
    ->name('crud.store');

Route::get('/{module}/{id}/edit', [ServiceMotorController::class, 'edit'])
    ->whereIn('module', $modules)
    ->name('crud.edit');

Route::put('/{module}/{id}', [ServiceMotorController::class, 'update'])
    ->whereIn('module', $modules)
    ->name('crud.update');

Route::delete('/{module}/{id}', [ServiceMotorController::class, 'destroy'])
    ->whereIn('module', $modules)
    ->name('crud.destroy');
