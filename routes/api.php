<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('bookables', 'Api\BookablesController')->only(['index', 'show']);
Route::get('bookables/{bookable}/availability', 'Api\BookableAvailabilityController')->name('bookables.availability.check');
Route::get('bookables/{bookable}/reviews', 'Api\BookableReviewController')->name('bookables.reviews.index');
Route::get('bookables/{bookable}/total', 'Api\BookablePriceController')->name('bookables.total.show');

Route::get('booking-by-review/{reviewKey}' , 'Api\BookingByReviewController')->name('booking.by-review.show');
Route::post('checkout', 'Api\CheckoutController')->name('checkout');

Route::apiResource('reviews', 'Api\ReviewController')->only(['show', 'store', ]);
