<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Http\Requests\StoreShippingRequest;
use App\Http\Requests\UpdateShippingRequest;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings = Shipping::all();
        return $this->response(code : 200 , data : $shippings);
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
    public function store(StoreShippingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipping $shipping)
    {
        $id = $shipping->id;
        $shipping = Shipping::with('order')->find()->id;
        return $this->response(code:200 , data: $shipping);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
    public function delete(Shipping $shipping)
    {
        
        $delete = $shipping->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Shipping $shipping)
    {
        
        $deleted = $shipping->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore($shipping, Shipping $g)
    {
        
        $shipping = Shipping::where('id',  $shipping)->restore();
        return $this->response(code: 202, data: $shipping);
    }
    public function delete_from_trash($shipping, Shipping $Shipping)
    {
        
        $shipping  = Shipping::where('id', $shipping)->forceDelete();
        return $this->response(code: 202, data: $shipping);
    }
}
