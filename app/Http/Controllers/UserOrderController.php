<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "beratPakaian" => "required|numeric",
            "paketLaundry" => "required|exists:packages,id",
            "nomorTelpon" => "required|numeric"
        ]);

        if ($validate) {
            return response()->json([
                "success" => true,
                "message" => "Berhasil membuat order",
                "request" => $request->all()
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Gagal membuat order"
            ]);
        }
    }
}
