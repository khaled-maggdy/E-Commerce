<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWhereCityRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreWhereCityRequest $city, Request $request)
    {
        $request = $request->validated();
        // get city
        $city = $city->validated();
        $city_id = City::all()->where('city', $city['name']);
        // add city_id in request
        $request['city_id'] = $city_id;
        // Hash password
        $request['password'] = Hash::make($request['password']);
        //insert_data
        $create = User::create($request);
        return $this->response(code: 201, data: $create);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $id = $user->id;
        $user = user::with('orders', 'city', 'reviews')->find($id);
        return $this->response(code: 200, data: $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
