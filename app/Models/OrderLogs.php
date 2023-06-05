<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLogs extends Model
{
    use HasFactory;

    public $fillable = [
        "order_id",
        "karyawan_id",
        "status",
        "note"
    ];
}
