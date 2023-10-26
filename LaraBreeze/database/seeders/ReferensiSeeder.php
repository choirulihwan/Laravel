<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referensi;

class ReferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Referensi::create([
            'id_ref'    => 'SUB',
            'no_ref'    => 'pcs',
            'keterangan'=> 'pcs',
            'keterangan_label'  => 'Satuan ukuran barang'
        ]);

    }
}
