<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param $reviewKey
     * @return Booking|void
     */
    public function __invoke($reviewKey)
    {
        return Booking::findByReviewKey($reviewKey) ?? abort(404);
    }
}
