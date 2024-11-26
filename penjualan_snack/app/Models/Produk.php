<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['kode_produk','Kategori','Userid','Isi','Ukuran','Expired','Berat','Deskirpsi','Nama_produk','file','Created_at','Created_by','Stok','Harga'];
    public $timestamps = false;

    protected $primaryKey = 'kode_produk';
    public $incrementing = false;

    public function Cart()
{
    return $this->hasMany(Cart::class, 'kode_produk');
}

public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
}


}
