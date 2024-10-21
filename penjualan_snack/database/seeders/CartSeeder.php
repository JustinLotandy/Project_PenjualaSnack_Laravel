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
        $Carts = new Cart;
        $Carts->kode_cart = 'CART001';
        $Carts->kode_pengguna = 'US-001';
        $Carts->Product_id = 'P-001'; // Dry snack
        $Carts->QTY = '5';
        $Carts->Desc = 'Dry snack - Potato Chips';
        $Carts->save();


        $Carts = new Cart;
        $Carts->kode_cart = 'CART002';
        $Carts->Product_id = 'P-002'; // Wet snack
        $Carts->QTY = '10';
        $Carts->Desc = 'Wet snack - Pudding';
        $Carts->save();

        $Carts = new Cart;
        $Carts->kode_cart = 'CART003';
        $Carts->kode_pengguna = 'US-001';
        $Carts->Product_id = 'P-003'; // Dry snack
        $Carts->QTY = '3';
        $Carts->Desc = 'Dry snack - Biscuits';
        $Carts->save();

        $Carts = new Cart;
        $Carts->kode_cart = 'CART004';
        $Carts->kode_pengguna = 'US-002';
        $Carts->Product_id = 'P-004'; // Wet snack
        $Carts->QTY = '7';
        $Carts->Desc = 'Wet snack - Jelly';
        $Carts->save();

        $Carts = new Cart;
        $Carts->kode_cart = 'CART005';
        $Carts->kode_pengguna = 'US-001';
        $Carts->Product_id = 'P-005'; // Dry snack
        $Carts->QTY = '12';
        $Carts->Desc = 'Dry snack - Popcorn';
        $Carts->save();
    }
}
