<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLogs;
use App\Models\Packages;
use Illuminate\Support\Facades\Storage;
use KrmPesan\ClientV3;

class UserOrderController extends Controller
{
    public function index()
    {
    }

    public function show(string $id)
    {
        $order = Order::with(['customer', 'package', 'inventory', 'logs'])->where('id', $id)->firstOrFail();

        // return $order;

        return view('order.track', compact('order'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "beratPakaian" => "required|numeric",
            "paketLaundry" => "required|exists:packages,id",
            "nomorTelpon" => "required|numeric"
        ]);

        $beratPakaian = $request->input('beratPakaian');
        $paketLaundry = $request->input('paketLaundry');
        $phone = $request->input('nomorTelpon');

        // check user if exist
        $user = Customer::where('phone', $phone)->first();
        $userId = null;

        // buat user kalau tidak ada
        if (!isset($user)) {
            $userCreate = Customer::create([
                "phone" => $phone,
            ]);

            $userId = $userCreate->id;
        } else {
            $userId = $user->id;
        }

        // Calculation Order
        $calculator = Order::calculation($beratPakaian);

        // Get Packages
        $package = Packages::where('id', $paketLaundry)->first();

        // buat order data
        $order = Order::create([
            "customer_id" => $userId,
            "package_id" => $paketLaundry,
            "inventory_id" => $calculator['inventory_id'],
            "berat_pakaian" => $beratPakaian,
            "total_harga" => ceil($beratPakaian * $package->harga),
            "estimasi" => $package->estimasi_pengerjaan,
            "waktu_pencucian" => $calculator['waktu_pencucian_order'],
            "penggunaan_air" => $calculator['penggunaan_air_order'],
            "status" => "WAITING",
        ]);

        $orderId = (string) $order->id;

        OrderLogs::create([
            "order_id" => $order->id,
            "status" => "WAITING",
        ]);

        $wa = new ClientV3([
            "tokenFile" => storage_path('app')
        ]);

        $wa->sendMessageTemplateText(
            $phone,
            'info_order_laundry',
            'id',
            [$orderId, env('APP_URL') . "/order/" . $orderId],
        );

        // $wa->sendMessageTemplateText(
        //     $phone,
        //     'info_order_laundry_done',
        //     'id',
        //     ['12345', 'Selesai dan Sudah Bisa Di Ambil', env('APP_URL') . "/order/1234"],
        // );

        return redirect()->route('order.show', $order->id);
    }
}
