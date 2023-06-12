<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        "customer_id",
        "package_id",
        "inventory_id",
        "berat_pakaian",
        "total_harga",
        "estimasi",
        "waktu_pencucian",
        "penggunaan_air",
        "status",
        "is_paid",
        "is_refund",
        "refund_amount",
        "keterangan",
    ];

    public $casts = [
        "is_paid" => "boolean",
        "is_refund" => "boolean",
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function package()
    {
        return $this->hasOne(Packages::class, 'id', 'package_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }

    public function logs()
    {
        return $this->hasMany(OrderLogs::class);
    }

    public static function calculation($beratPakaian, $inventoryId = null)
    {
        // get inventory
        $inventory = Inventory::where("is_active", false)
            ->when(isset($inventoryId), function ($query, $inventoryId) {
                return $query->where("id", $inventoryId);
            })->inRandomOrder()->first();

        $waktu_pencucian_perkilo = $inventory->waktu_pencucian / $inventory->kapasitasi_mesin;
        $penggunaan_air_perkilo = $inventory->perkiraan_air / $inventory->kapasitasi_mesin;

        $waktu_pencucian_order = $beratPakaian * $waktu_pencucian_perkilo;
        $penggunaan_air_order = $beratPakaian * $penggunaan_air_perkilo;
        $inventory_id = $inventory->id;

        return compact("inventory_id", "waktu_pencucian_order", "penggunaan_air_order");
    }
}
