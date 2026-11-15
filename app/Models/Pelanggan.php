<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat',
        'pekerjaan',
    ];

    public function kendaraan(): HasMany
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function daftarService(): HasMany
    {
        return $this->hasMany(DaftarService::class);
    }
}
