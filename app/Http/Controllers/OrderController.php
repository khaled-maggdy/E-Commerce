<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get();
        return $this->response(code: 200, data: $orders);
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
        $id = $order->id;
        $order = order::with('user', 'orderdetails', 'payment', 'ship')->find($id);
        return $this->response(code: 200, data: $order);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function delete(Order $order)
    {

        $delete = $order->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Order $order)
    {

        $deleted = $order->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore(Order $order)
    {

        $order = Order::where('id',  $order)->restore();
        return $this->response(code: 202, data: $order);
    }
    public function delete_from_trash(Order $order)
    {

        $order  = Order::where('id', $order)->forceDelete();
        return $this->response(code: 202, data: $order);
    }
}
