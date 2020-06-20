<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckBookableAvailabilityRequest;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CheckBookableAvailabilityRequest $request
     * @param Bookable $bookable
     * @return void
     */
    public function __invoke(CheckBookableAvailabilityRequest $request, Bookable $bookable)
    {
        dd($bookable->bookings);
    }
}
