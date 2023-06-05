<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderLogs;
use Illuminate\Http\Request;

class OrderController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(Request $request, OrdersDataTable $dataTables)
    {
        return $dataTables->render('layouts.tables', ['title' => 'Orders']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $status = $request->input('status');

        $order->status = $status;
        $order->save();

        OrderLogs::create([
            "order_id" => $order->id,
            "status" => $status
        ]);

        return response()->json([
            "status" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Order $order)
    {
        if (!$request->user()->can('admin')) {
            throw new \Exception('Unauthorized');
        }
    }
}
