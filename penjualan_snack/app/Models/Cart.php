<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['kode_cart','kode_pengguna','nama_pengguna','kode_customer','nama_customer','Product_id','QTY','Desc','phone'];

    protected $primaryKey = 'kode_cart';
    public $incrementing = false;

    public function produk()
{
    return $this->belongsTo(Produk::class, 'kode_produk');
}

public function Pengguna()
{
    return $this->belongsTo(Pengguna::class, 'kode_pengguna');
}

public function Transaksi()
{
    return $this->belongsTo(Transaksi::class, 'kode_cart');
}

protected static function booted()
{
    static::updated(function ($cart) {
        Transaksi::where('kode_cart', $cart->kode_cart)
            ->update(['QTY' => $cart->QTY]);
    });
}




}


