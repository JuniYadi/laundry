<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    public $fillable = [
        "nama",
        "is_setrika",
        "harga",
        "estimasi_pengerjaan",
        "is_express"
    ];

    public $casts = [
        "is_setrika" => "boolean",
        "is_express" => "boolean"
    ];
}
