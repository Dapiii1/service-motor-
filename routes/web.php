
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceMotorController;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\Pembayaran;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {

    $totalPelanggan = Pelanggan::count();
    $totalKendaraan = Kendaraan::count();
    $totalService = DaftarService::count();
    $totalPembayaran = Pembayaran::count();

    $serviceTerbaru = DaftarService::with([
        'pelanggan',
        'kendaraan'
    ])->latest()->take(5)->get();

    return view('dashboard', compact(
        'totalPelanggan',
        'totalKendaraan',
        'totalService',
        'totalPembayaran',
        'serviceTerbaru'
    ));

})->name('dashboard');

$modules = [
    'pelanggan',
    'kendaraan',
    'daftar-service',
    'data-service',
    'pembayaran',
];

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
