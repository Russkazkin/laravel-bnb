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
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CheckBookableAvailabilityRequest $request, Bookable $bookable)
    {
        return $bookable->checkAvailabilityFor($request['from'], $request['to'])
            ? response()->json([])
            : response()->json([], 404);
    }
}
