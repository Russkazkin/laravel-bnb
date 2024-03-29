<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Bookable;
use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
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

        $bookingsData = $request['bookings'];
        $addressData = $request['customer'];

        $bookings = collect($bookingsData)->map(function ($bookingData) use ($addressData){
            $bookable = Bookable::findOrFail($bookingData['bookable_id']);
            $booking = new Booking();
            $booking->from = $bookingData['from'];
            $booking->to = $bookingData['to'];
            $booking->price = $bookable->totalFor($booking->from, $booking->to)['total'];
            $booking->bookable()->associate($bookable);
            $booking->address()->associate(Address::create($addressData));
            $booking->save();
            return $booking;
        });
        return $bookings;
    }
}
