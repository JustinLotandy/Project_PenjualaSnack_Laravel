<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pengguna extends Model
{
    use HasFactory;
    protected $fillable = ['kode_pengguna','Username','password','Role'];

    protected $primaryKey = 'kode_pengguna';
    public $incrementing = false;

    public function Cart()
    {
        return $this->hasMany(Cart::class, 'kode_pengguna');
    }
}
