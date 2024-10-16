<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBank extends Model
{
    use HasFactory;
    protected $fillable = ['id_databank','kode','norek','nama_databank','file','created_at','created_by'];
    public $timestamps = false;
}
