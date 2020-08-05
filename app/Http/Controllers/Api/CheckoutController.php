<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CheckoutRequest $request)
    {
        $request->validate([
            'bookings.*' => ['required', function($attribute, $value, $fail) {
                $bookable = Bookable::findOrFail($value['bookable_id']);
                if(!$bookable->checkAvailabilityFor($value['from'], $value['to'])) {
                    $fail("The object $bookable->name is not available in given dates");
                }
            }],
        ]);
        return $request;
    }
}
