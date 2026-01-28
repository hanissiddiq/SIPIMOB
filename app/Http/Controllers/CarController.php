<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CarController extends Controller
{
     public function index()
    {
        $today = Carbon::today();

        $cars = Car::with(['bookings' => function ($q) use ($today) {
            $q->where('status', 'approved')
              ->where('start_date', '<=', $today)
              ->where('end_date', '>=', $today);
        }])->get();

        return view('cars.index', compact('cars'));
    }
}
