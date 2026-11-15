<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $table = 'pembayaran_services';

    protected $fillable = [
        'daftar_service_id',
        'biaya_service',
        'jenis_pembayaran',
        'keterangan',
    ];

    public function daftarService(): BelongsTo
    {
        return $this->belongsTo(DaftarService::class);
    }
}
