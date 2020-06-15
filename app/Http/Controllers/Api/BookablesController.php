<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookablesIndexResource;
use App\Http\Resources\BookablesShowResource;

class BookablesController extends Controller
{
    public function index()
    {
        return BookablesIndexResource::collection(Bookable::all());
    }

    public function show(Bookable $bookable)
    {
        return new BookablesShowResource($bookable);
    }
}
