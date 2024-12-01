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

    static::updated(function ($approval) {
        // Update status di Transaksi jika status di Approval berubah
        if ($approval->isDirty('Status')) {
            Transaksi::where('kode_transaksi', $approval->kode_transaksi)
                ->update(['status_approval' => $approval->Status]);
        }
    });

    static::updated(function ($approval) {
        // Pastikan hanya dijalankan ketika kolom `Status` berubah
        if ($approval->isDirty('Status')) {
            // Perbarui status_approval di model Transaksi
            Transaksi::where('kode_transaksi', $approval->kode_transaksi)
                ->update(['status_approval' => $approval->Status]);
        }
    });
    }

    

}
