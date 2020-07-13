<?php

namespace App\Http\Controllers\Api;

use App\Booking;
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
        $data = $request->only(['id', 'content', 'rating']);

        $booking = Booking::findByReviewKey($request['id']);

        if ($booking === null) {
            return abort(404);
        }

        $booking->review_key = '';
        $booking->save();

        $review = Review::make($data);
        $review->booking_id = $booking->id;
        $review->bookable_id = $booking->bookable_id;
        $review->save();

        return new ReviewResource($review);
    }
}
