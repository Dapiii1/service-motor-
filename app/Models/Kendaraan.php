<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'pelanggan_id',
        'no_plat',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan',
        'warna',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function daftarService(): HasMany
    {
        return $this->hasMany(DaftarService::class);
    }
}
