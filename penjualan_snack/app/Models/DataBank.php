<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBank extends Model
{
    use HasFactory;
    protected $fillable = ['kode_databank','norek','nama_databank','file','created_at','created_by'];
    
    protected $primaryKey = 'kode_databank';
    public $incrementing = false;
    public $timestamps = false;
}
