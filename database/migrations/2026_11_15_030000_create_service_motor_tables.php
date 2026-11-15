
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. TABEL PELANGGAN
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->timestamps();
        });

        // 2. TABEL KENDARAAN
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')
                ->constrained('pelanggan')
                ->cascadeOnDelete();

            $table->string('no_plat')->unique();
            $table->enum('jenis_kendaraan', [
                'Matic',
                'Manual Transmisi'
            ]);
            $table->string('no_stnk');
            $table->year('tahun_pembuatan');
            $table->string('warna');
            $table->timestamps();
        });

        // 3. TABEL DAFTAR SERVICE
        Schema::create('daftar_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggan')
                ->cascadeOnDelete();

            $table->foreignId('kendaraan_id')
                ->constrained('kendaraan')
                ->cascadeOnDelete();

            $table->text('keluhan');
            $table->date('tanggal_service');
            $table->timestamps();
        });

        // 4. TABEL DATA SERVICE
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('daftar_service_id')
                ->unique()
                ->constrained('daftar_services')
                ->cascadeOnDelete();

            $table->text('keluhan_kendaraan');
            $table->string('estimasi_service');
            $table->string('nama_mekanik');
            $table->string('sparepart_pengganti')->nullable();
            $table->timestamps();
        });

        // 5. TABEL PEMBAYARAN
        Schema::create('pembayaran_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('daftar_service_id')
                ->unique()
                ->constrained('daftar_services')
                ->cascadeOnDelete();

            $table->decimal('biaya_service', 12, 2);
            $table->enum('jenis_pembayaran', [
                'Cash',
                'Non Tunai'
            ]);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_services');
        Schema::dropIfExists('data_services');
        Schema::dropIfExists('daftar_services');
        Schema::dropIfExists('kendaraan');
        Schema::dropIfExists('pelanggan');
    }
};
