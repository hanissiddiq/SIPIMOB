<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;

class BookingController extends Controller
{

public function create()
{
    $today = Carbon::today();

    $cars = Car::whereDoesntHave('bookings', function ($q) use ($today) {
        $q->where('status', 'approved')
          ->where('start_date', '<=', $today)
          ->where('end_date', '>=', $today);
    })->get();

    return view('bookings.create-booking', compact('cars'));
}

public function store(Request $request, Car $car)
{
   $request->validate([
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $bentrok = Booking::where('car_id', $request->car_id)
        ->where('status', 'approved')
        ->where(function ($q) use ($request) {
            $q->where('start_date', '<=', $request->end_date)
              ->where('end_date', '>=', $request->start_date);
        })
        ->exists();

    if ($bentrok) {
        return back()->with('error', 'Mobil sudah dibooking di tanggal tersebut');
    }

    Booking::create([
        'user_id' => auth()->id(),
        'car_id' => $request->car_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => 'pending',
    ]);

    return redirect('/my-bookings')
        ->with('success', 'Booking berhasil dikirim, menunggu approval');
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

    public function myBookings()
    {
        $bookings = auth()->user()
        ->bookings()
        ->with('car')
        ->latest()
        ->get();

    return view('bookings.my-bookings', compact('bookings'));
    }

}
