<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return $this->response(code : 200 , data : $payments);
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
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
      $id = $payment->id;
        $payment = Payment::with('order', 'user')->find($id);
        return $this->response(code: 200, data: $payment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
    public function delete(Payment $payment)
    {
        
        $delete = $payment->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Payment $payment)
    {
        
        $deleted = $payment->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore( Payment $payment)
    {
        
        $payment = Payment::where('id',  $payment)->restore();
        return $this->response(code: 202, data: $payment);
    }
    public function delete_from_trash($payment, Payment $Payment)
    {
        
        $payment  = Payment::where('id', $payment)->forceDelete();
        return $this->response(code: 202, data: $payment);
    }

}
