<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['kode_transaksi','Userid','kode_databank','kode_databank','nama_produk','kode_pengguna','Transactionnumber','Total_berat','Phone','No_resi','Kurir','Kota','Ongkir','Total','Bukti_tansaksi','Status','Date','Adress'];
    protected $primaryKey = 'kode_transaksi';
    public $incrementing = false;
    public $timestamps = false;
}
