<h2>Daftar Mobil</h2>

<a href="/booking/create">➕ Booking Mobil</a>

@foreach($cars as $car)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">
        <b>{{ $car->name }}</b> - {{ $car->brand }}

        @if($car->bookings->count() > 0)
            <p style="color:red">❌ Sedang dibooking hari ini</p>
        @else
            <p style="color:green">✅ Tersedia hari ini</p>
        @endif
    </div>
@endforeach
<a href="/my-bookings">📋 Lihat Booking Saya</a>
