<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Review;

class ReviewController extends Controller
{
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    public function store(ReviewStoreRequest $request)
    {

    }
}
