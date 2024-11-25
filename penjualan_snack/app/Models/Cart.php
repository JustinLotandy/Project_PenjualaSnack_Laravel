<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['kode_cart','kode_pengguna','Product_id','QTY','Desc'];

    protected $primaryKey = 'kode_cart';
    public $incrementing = false;

    public function produk()
{
    return $this->belongsTo(Produk::class, 'kode_produk');
}

public function Pengguna()
{
    return $this->belongsTo(Produk::class, 'kode_pengguna');
}

}


