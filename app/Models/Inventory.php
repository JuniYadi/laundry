<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $fillable = [
        "nama_mesin",
        "kapasitasi_mesin",
        "waktu_pencucian",
        "perkiraan_air",
        "is_active",
        "comment",
        "is_express"
    ];

    public $casts = [
        "is_active" => "boolean",
        "is_express" => "boolean",
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
