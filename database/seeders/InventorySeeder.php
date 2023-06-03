<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [];
        $now = now();

        for ($i = 0; $i < 10; $i++) {
            $datas[] = [
                "nama_mesin" => "Mesin " . $i + 1,
                "kapasitasi_mesin" => 10,
                "waktu_pencucian" => 25,
                "perkiraan_air" => 150,
                "is_active" => true,
                "is_express" => false,
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }

        DB::table('inventories')->insert($datas);
    }
}
