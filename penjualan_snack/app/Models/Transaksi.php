<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_transaksi',
        'kode_databank',
        'kode_cart',
        'kode_customer',
        'nama_customer',
        'nama_produk',
        'Total_berat',
        'Phone',
        'No_resi',
        'Kurir',
        'Kota',
        'Ongkir',
        'Total',
        'Bukti_transaksi',
        'Date',
        'Adress',
        'QTY',
        'status_approval',
    ];
    protected $primaryKey = 'kode_transaksi';
    public $incrementing = false;
    public $timestamps = false;

    public function produk()
    {
    return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk'); // Relasi berdasarkan kode_produk
    }

    public function cart()
    {
    return $this->belongsTo(Cart::class, 'kode_cart', 'kode_cart');
    }

    public function getQTYAttribute()
    {
    return $this->cart ? $this->cart->QTY : null;
    }

    public function approve(): HasOne
{
    return $this->hasOne(Approval::class, 'kode_transaksi', 'kode_transaksi');
}


    
    protected static function booted()
    {
        static::created(function ($transaksi) {
            // Simpan data ke tabel approval
            Approval::create([
                'kode_transaksi' => $transaksi->kode_transaksi,
                'No_resi' => $transaksi->No_resi,
                'kode_customer' => $transaksi->kode_customer,
                'nama_customer' => $transaksi->nama_customer,
                'Status' => 'Pending', // Atur status default jika diperlukan
            ]);
            

          
        });
        static::deleting(function ($transaksi) {
            // Hapus approval terkait
            $transaksi->approve()->delete();
        });

        static::updated(function ($approval) {
            if ($approval->isDirty('Status')) {
                \Log::info('Status changed in Approval', [
                    'old' => $approval->getOriginal('Status'),
                    'new' => $approval->Status,
                ]);
        
                Transaksi::where('kode_transaksi', $approval->kode_transaksi)
                    ->update(['status_approval' => $approval->Status]);
            }
        });
        
        
    }
}
