<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['kode_transaksi','kode_databank','kode_databank','kode_pengguna','Transactionnumber','Total_berat','Phone','No-resi','Kurir','Kota','Ongkir','Total','Bukit_tansaksi','Status','Date','Adress'];
    public $timestamps = false;
}
