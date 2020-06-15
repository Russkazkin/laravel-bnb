<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookablesController extends Controller
{
    public function index()
    {
        return Bookable::all();
    }

    public function show(Bookable $bookable)
    {
        return $bookable;
    }
}