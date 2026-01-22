<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;

class BookingController extends Controller
{
public function store(Request $request, Car $car)
    {
        if ($car->status !== 'tersedia') {
            return back()->with('error', 'Mobil tidak tersedia');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => now(),
            'end_date' => now()->addDays(1),
        ]);

        $car->update(['status' => 'tidak_tersedia']);

        return back()->with('success', 'Mobil berhasil dibooking');
    }


    public function return(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->update(['status' => 'dikembalikan']);
        $booking->car->update(['status' => 'tersedia']);

        return back()->with('success', 'Mobil berhasil dikembalikan');
    }

}
