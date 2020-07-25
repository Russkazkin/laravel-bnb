<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookablePriceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Bookable $bookable
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function __invoke(Bookable $bookable, Request $request)
    {
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
        ]);

        $days = (new Carbon($data['from']))->diffInDays(New Carbon($data['to'])) + 1;

        $total = $days * $bookable->price;

        return response()->json([
            'total' => $total,
            'breakdown' => [
                $bookable->price => $days,
            ],
        ]);
    }
}
