<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Inventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::count();
        $inventories = Inventory::count();

        return view('home', [
            "total_orders" => $orders,
            "total_inventories" => $inventories,
        ]);
    }
}
