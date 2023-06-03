<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public static function calculation($beratPakaian, $inventoryId = null)
    {
        // get inventory
        $inventory = Inventory::where("is_active", false)
            ->when(isset($inventoryId), function ($query, $inventoryId) {
                return $query->where("id", $inventoryId);
            })->first();

        $waktu_pencucian_perkilo = $inventory->waktu_pencucian / $inventory->kapasitasi_mesin;
        $penggunaan_air_perkilo = $inventory->perkiraan_air / $inventory->kapasitasi_mesin;

        $waktu_pencucian_order = $beratPakaian * $waktu_pencucian_perkilo;
        $penggunaan_air_order = $beratPakaian * $penggunaan_air_perkilo;

        return compact("waktu_pencucian_order", "penggunaan_air_order");
    }
}
