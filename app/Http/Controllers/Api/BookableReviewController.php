<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookableReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Bookable $bookable
     * @return \App\Review[]|\Illuminate\Database\Eloquent\Collection
     */
    public function __invoke(Bookable $bookable)
    {
        return $bookable->reviews()->latest()->get();
    }
}
