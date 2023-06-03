<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $datas = [
            [
                "nama" => "Cuci Kering",
                "is_setrika" => false,
                "harga" => 5000,
                "estimasi_pengerjaan" => 48,
                "is_express" => false,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "nama" => "Cuci Kering Kilat",
                "is_setrika" => false,
                "harga" => 7500,
                "estimasi_pengerjaan" => 36,
                "is_express" => false,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "nama" => "Cuci Kering Express",
                "is_setrika" => false,
                "harga" => 10000,
                "estimasi_pengerjaan" => 12,
                "is_express" => true,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "nama" => "Cuci Setrika",
                "is_setrika" => true,
                "harga" => 10000,
                "estimasi_pengerjaan" => 72,
                "is_express" => false,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "nama" => "Cuci Setrika Kilat",
                "is_setrika" => true,
                "harga" => 15000,
                "estimasi_pengerjaan" => 48,
                "is_express" => false,
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "nama" => "Cuci Setrika Express",
                "is_setrika" => true,
                "harga" => 20000,
                "estimasi_pengerjaan" => 24,
                "is_express" => true,
                "created_at" => $now,
                "updated_at" => $now
            ],
        ];

        DB::table('packages')->insert($datas);
    }
}
