<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['id','Userid','Kategori','Isi','Ukuran','Expired','Berat','Deskirpsi','Nama','file','Created_at','Created_by','Stok','Harga'];
    public $timestamps = false;
}
