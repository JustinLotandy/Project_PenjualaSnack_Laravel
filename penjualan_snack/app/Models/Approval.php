<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'No_resi',
        'kode_customer',
        'nama_customer',
        'Status',
    ];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }
    protected static function booted()
    {
    static::deleting(function ($approval) {
        // Hapus data transaksi terkait
        Transaksi::where('kode_transaksi', $approval->kode_transaksi)->delete();
    });
    }

}
