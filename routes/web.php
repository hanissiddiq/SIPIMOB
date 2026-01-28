<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/cars', [CarController::class, 'index'])->name('list-car');
    Route::post('/booking/{car}', [BookingController::class, 'store']);
    Route::post('/booking/{booking}/return', [BookingController::class, 'return']);
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])
        ->name('my-bookings');

    Route::get('/booking/create', [BookingController::class, 'create']);
    Route::post('/booking', [BookingController::class, 'store']);
});
 Route ::get('/',function(){return view ('welcome');});
 Route::get('/dashboard',function()
 {return view ('dashboard');})->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
