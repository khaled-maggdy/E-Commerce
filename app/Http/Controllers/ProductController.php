<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return $this->response(code: 200, data: $products);
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $id = $product->id;
        $product = product::with('reviews', 'orderdetails', 'category')->find($id);
        return $this->response(code: 200, data: $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    public function delete(Product $Product)
    {
        $delete = $Product->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Product $Product)
    {
        $deleted = $Product->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore(Product $product)
    {
        $Product = Product::where('id', $product)->restore();
        return $this->response(code: 202, data: $Product);
    }
    public function delete_from_trash(Product $Product)
    {
        $Product  = Product::where('id', $Product)->forceDelete();
        return $this->response(code: 202, data: $Product);
    }
}
