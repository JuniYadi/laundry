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
        $today_revenue = Order::whereDate('created_at', date('Y-m-d'))->sum('total_harga');
        $today_order = Order::whereDate('created_at', date('Y-m-d'))->count();
        $today_water = Order::select('penggunaan_air')
            ->join('order_logs', 'order_logs.order_id', '=', 'orders.id')
            ->where('order_logs.status', 'IN_WASHING')
            ->whereDate('order_logs.created_at', date('Y-m-d'))->sum('penggunaan_air');

        $monthly_revenue = Order::whereMonth('created_at', date('m'))->where('status', 'DONE')->sum('total_harga');

        return view('home', compact('today_revenue', 'today_order', 'today_water', 'monthly_revenue'));
    }
}
