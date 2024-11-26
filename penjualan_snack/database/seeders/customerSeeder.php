<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = new Customer;
        $customers->kode_customer = 'CUST001';
        $customers->nama_customer = 'John Doe';
        $customers->no_telepon = '081234567890';
        $customers->save();

        $customers = new Customer;
        $customers->kode_customer = 'CUST002';
        $customers->nama_customer = 'Jane Smith';
        $customers->no_telepon = '082345678901';
        $customers->save();

        $customers = new Customer;
        $customers->kode_customer = 'CUST003';
        $customers->nama_customer = 'Michael Johnson';
        $customers->no_telepon = '083456789012';
        $customers->save();

        $customers = new Customer;
        $customers->kode_customer = 'CUST004';
        $customers->nama_customer = 'Emily Davis';
        $customers->no_telepon = '084567890123';
        $customers->save();

        $customers = new Customer;
        $customers->kode_customer = 'CUST005';
        $customers->nama_customer = 'William Brown';
        $customers->no_telepon = '085678901234';
        $customers->save();
    }
}
