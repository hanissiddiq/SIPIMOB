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
        <div class="mb-6 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white border border-gray-200">
            <div class="flex items-center p-2">
                {{-- Gambar Mobil di Sebelah Kiri --}}
                <div class="w-[120px] h-[60px] bg-gray-100 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                </div>

                {{-- Informasi Mobil di Sebelah Kanan --}}
                <div class="w-2/3 p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $car->name }}</h3>
                        <p class="text-gray-600 text-lg mt-1">{{ $car->brand }} - {{ $car->year ?? 'Tahun Tidak Tersedia' }}</p>
                        @if($car->color)
                            <p class="text-gray-500 text-sm mt-2">Warna: <span class="font-semibold">{{ $car->color }}</span></p>
                        @endif
                    </div>

                    <div class="mt-4">
                        @if($car->bookings->count() > 0)
                            <div class="inline-flex items-center bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
                                <span class="text-xl mr-2">❌</span>
                                <span>Sedang dibooking hari ini</span>
                            </div>
                        @else
                            <div class="inline-flex items-center bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                                <span class="text-xl mr-2">✅</span>
                                <span>Tersedia hari ini</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <a href="/my-bookings" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">📋 Lihat Booking Saya</a>
    @include('includes.navigation')
@endsection


@section('scripts')
@endsection
