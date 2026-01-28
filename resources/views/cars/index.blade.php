{{-- <h2>Daftar Mobil</h2>

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
<a href="/my-bookings">📋 Lihat Booking Saya</a> --}}


{{-- ini bagian kode Blade untuk menampilkan daftar mobil beserta status booking hari ini. Jika mobil sedang dibooking, akan ditampilkan pesan berwarna merah, sedangkan jika tersedia, akan ditampilkan pesan berwarna hijau. Terdapat juga tautan untuk membuat booking baru dan melihat booking yang sudah dibuat oleh pengguna.    --}}

@extends('layouts.template')
@section('content')
    <h2 class="text-2xl font-bold mb-4">Daftar Mobil</h2>

    <a href="/booking/create" class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">➕ Booking Mobil</a>

    @foreach($cars as $car)
        <div class="border border-gray-300 p-4 mb-4 rounded">
            <b class="text-lg">{{ $car->name }}</b> - <span class="text-gray-600">{{ $car->brand }}</span>

            @if($car->bookings->count() > 0)
                <p class="text-red-600 mt-2">❌ Sedang dibooking hari ini</p>
            @else
                <p class="text-green-600 mt-2">✅ Tersedia hari ini</p>
            @endif
        </div>
    @endforeach
    <a href="/my-bookings" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">📋 Lihat Booking Saya</a>
    @include('includes.navigation')
@endsection


@section('scripts')
@endsection
