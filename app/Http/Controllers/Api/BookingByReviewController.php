<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingByReviewShowResource;
use Illuminate\Http\Request;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $reviewKey
     * @return BookingByReviewShowResource
     */
    public function __invoke($reviewKey)
    {
        return new BookingByReviewShowResource(Booking::findByReviewKey($reviewKey) ?? abort(404));
    }
}
