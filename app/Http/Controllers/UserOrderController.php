<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use KrmPesan\ClientV3;

class UserOrderController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            "beratPakaian" => "required|numeric",
            "paketLaundry" => "required|exists:packages,id",
            "nomorTelpon" => "required|numeric"
        ]);

        $phone = $request->input('nomorTelpon');

        $wa = new ClientV3([
            "tokenFile" => storage_path('app')
        ]);

        // $wa->sendMessageTemplateText(
        //     $phone,
        //     'info_order_laundry',
        //     'id',
        //     ['12345', env('APP_URL') . "/order/1234"],
        // );

        $wa->sendMessageTemplateText(
            $phone,
            'info_order_laundry_done',
            'id',
            ['12345', 'Selesai dan Sudah Bisa Di Ambil', env('APP_URL') . "/order/1234"],
        );



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
