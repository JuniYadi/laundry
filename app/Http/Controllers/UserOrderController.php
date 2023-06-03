<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "beratPakaian" => "required|numeric",
            "paketLaundry" => "required|exists:packages,id",
            "nomorTelpon" => "required|numeric"
        ]);

        $calculator = Order::calculation($request->input('beratPakaian'));

        if ($validate) {
            return response()->json([
                "success" => true,
                "message" => "Berhasil membuat order",
                "request" => $calculator
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Gagal membuat order"
            ]);
        }
    }
}
