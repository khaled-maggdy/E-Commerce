<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cites = City::all();
        return $this->Response(code : 200 , data : $cites);
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
    public function store(StoreCityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return $this->response(code : 200 , data:$city);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
    public function delete(City $city)
    {
        $delete = $city->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(City $city)
    {
        $deleted = $city->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore( City $city)
    {
        $city = City::where('id', $city)->restore();
        return $this->response(code: 202, data: $city);
    }
    public function delete_from_trash( $city, City $City)
    {

        $city = City::where('id', $city)->forceDelete();
        return $this->response(code: 202, data: $city);
    }
}
