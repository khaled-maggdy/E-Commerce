<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return $this->response(code : 200 , data : $reviews);
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
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        $id = $review->id;
        $review = Review::with('user' , 'product' )->find()->id;
        return $this->response(code : 200 , data : $review);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
    public function delete(Review $review)
    {
        
        $delete = $review->delete();
        return $this->response(code: 202, data: $delete);
    }

    public function deleted(Review $review)
    {
        
        $deleted = $review->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore($review, Review $g)
    {
        
        $review = Review::where('id',  $review)->restore();
        return $this->response(code: 202, data: $review);
    }
    public function delete_from_trash($review, Review $Review)
    {
        
        $review  = Review::where('id', $review)->forceDelete();
        return $this->response(code: 202, data: $review);
    }
}
