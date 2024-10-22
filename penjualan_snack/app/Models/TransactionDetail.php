<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['kode_transaction_detail','kode_product','kode_product','kode_transaksi','Qty','Price'];
    
    protected $primaryKey = 'kode_transaksi';
    public $incrementing = false;
}
