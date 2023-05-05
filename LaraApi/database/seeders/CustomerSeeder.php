<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(
            [
                "name"    => "Bob Odenkraken", 
                "phone"	=> "+91 7428731249",
                "address"    => "Jalan Suli No. 11, Bali, Indonesia",
                "postal_code"    => "20456",
            ]
        );
    }
}
