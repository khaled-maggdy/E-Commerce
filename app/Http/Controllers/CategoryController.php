<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();
        return $this->response(code: 200, data: $category);
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $id = $category->id;
        $category = Category::with('products')->find($id);
        return $this->response(code: 200, data: $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
    public function delete(Category $category)
    {

        $delete = $category->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Category $category)
    {

        $deleted = $category->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore(Category $category)
    {

        $category = Category::where('id',  $category)->restore();
        return $this->response(code: 202, data: $category);
    }
    public function delete_from_trash(Category $category)
    {

        $category  = Category::where('id', $category)->forceDelete();
        return $this->response(code: 202, data: $category);
    }
}
