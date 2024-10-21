<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['kode_kategori','Nama_kategori','View_count'];

    protected $primaryKey = 'kode_kategori';
    public $incrementing = false;
}
