<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart = new Cart;
        $cart->kode_cart = 'CART-001';
        $cart->kode_pengguna = 'US-001';
        $cart->kode_customer = 'CUST001';
        $cart->nama_customer = 'John Doe';
        $cart->phone = '081234567890';
        $cart->nama_pengguna = 'Budi'; // Mengacu pada Username pengguna
        $cart->Product_id = 'P-001'; // Dry snack - Potato Chips
        $cart->QTY = '5';
        $cart->Desc = 'Dry snack - Potato Chips';
        $cart->created_at = Carbon::now();
        $cart->save();

        $cart = new Cart;
        $cart->kode_cart = 'CART-002';
        $cart->kode_pengguna = 'US-002';
        $cart->kode_customer = 'CUST002';
        $cart->nama_customer = 'Jane Smith';
        $cart->phone = '082345678901';
        $cart->nama_pengguna = 'Gary'; // Mengacu pada Username pengguna
        $cart->Product_id = 'P-002'; // Wet snack - Pudding
        $cart->QTY = '10';
        $cart->Desc = 'Wet snack - Pudding';
        $cart->created_at = Carbon::now();
        $cart->save();

        $cart = new Cart;
        $cart->kode_cart = 'CART-003';
        $cart->kode_pengguna = 'US-001';
        $cart->kode_customer = 'CUST003';
        $cart->nama_customer = 'Michael Johnson';
        $cart->phone = '083456789012';
        $cart->nama_pengguna = 'Budi'; // Mengacu pada Username pengguna
        $cart->Product_id = 'P-003'; // Dry snack - Biscuits
        $cart->QTY = '3';
        $cart->Desc = 'Dry snack - Biscuits';
        $cart->created_at = Carbon::now();
        $cart->save();
    }
}
