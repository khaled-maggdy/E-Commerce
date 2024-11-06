<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Http\Requests\StoreOrderDetailsRequest;
use App\Http\Requests\UpdateOrderDetailsRequest;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderdetails = OrderDetails::get();
        return $this->response(code: 200, data: $orderdetails);
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
    public function store(StoreOrderDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetails $orderDetails)
    {
        $id = $orderDetails->id;
        $orderDetails = orderDetails::with('product')->find($id);
        return $this->response(code: 200, data: $orderDetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailsRequest $request, OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetails $orderDetails)
    {
        //
    }
    public function delete(OrderDetails $orderDetails)
    {

        $delete = $orderDetails->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(OrderDetails $orderDetails)
    {

        $deleted = $orderDetails->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore(OrderDetails $orderDetails)
    {

        $orderDetails = OrderDetails::where('id',  $orderDetails)->restore();
        return $this->response(code: 202, data: $orderDetails);
    }
    public function delete_from_trash($orderDetails, OrderDetails $OrderDetails)
    {

        $orderDetails  = OrderDetails::where('id', $orderDetails)->forceDelete();
        return $this->response(code: 202, data: $orderDetails);
    }
}
