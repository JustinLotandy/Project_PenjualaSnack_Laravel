<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBank extends Model
{
    use HasFactory;
    protected $fillable = ['kode','norek','nama','file','created_at','created_by'];
    public $timestamps = false;
}
