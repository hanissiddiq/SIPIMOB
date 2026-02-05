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

    {{-- -------------------------------------------------- --}}
    <div id="Background"
            class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
        </div>

        <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
            <div class="flex flex-col gap-1">
                <p> Hi, <span class="font-bold text-ngekos-orange">{{ Auth::user()->name }}</span> </p>
                {{-- <p>Have a nice day,</p> --}}
                <h1 class="font-bold text-xl leading-[30px]">Explore The Car</h1>
            </div>
            <a href="#"
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="assets/images/icons/notification.svg" class="w-[28px] h-[28px]" alt="icon">
            </a>
        </div>

        <section id="Popular" class="flex flex-col gap-4">
            <div class="flex items-center justify-between px-5">
                <h2 class="font-bold">Popular Kos</h2>
                <a href="#">
                    <div class="flex items-center gap-2">
                        <span>See all</span>
                        <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                    </div>
                </a>
            </div>
            <div class="swiper w-full overflow-x-hidden">
                <div class="swiper-wrapper">
                   @foreach($cars as $car)
                        <div class="swiper-slide !w-fit">
                            <a href="#" class="card">
                                <div
                                    class="flex flex-col w-[250px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                                    <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                                        <img src="{{ Storage::url($car->image) }}" class="w-full h-full object-cover"
                                            alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-3">
                                        <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $car->name }}</h3>
                                        <hr class="border-[#F1F2F6]">
                                        <div class="flex items-center gap-[6px]">
                                            <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0"
                                                alt="icon">
                                            <p class="text-sm text-ngekos-grey">{{ $car->brand }} - {{ $car->year ?? 'Tahun Tidak Tersedia' }}</p>
                                        </div>
                                        <div class="flex items-center gap-[6px]">
                                            <img src="assets/images/icons/3dcube.svg" class="w-5 h-5 flex shrink-0"
                                                alt="icon">
                                            <p class="text-sm text-ngekos-grey">Warna: {{ $car->color }}</p>
                                        </div>
                                        <div class="flex items-center gap-[6px]">
                                            <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0"
                                                alt="icon">
                                            <p class="text-sm text-ngekos-grey">{{ $car->plate_number }}</p>
                                        </div>
                                        <hr class="border-[#F1F2F6]">
                                        <p class="font-semibold text-lg text-ngekos-orange">
                                            @if($car->bookings->count() > 0)
                                                <div class="inline-flex items-center bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
                                                    <span class="text-sm mr-2">❌</span>
                                                    <span class="text-sm">Sedang dibooking hari ini</span>
                                                </div>
                                            @else
                                                <div class="inline-flex items-center bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                                                    <span class="text-sm mr-2">✅</span>
                                                    <span class="text-sm">Tersedia hari ini</span>
                                                </div>
                                            @endif
                                            {{-- <span class="text-sm text-ngekos-grey font-normal">/bulan</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
            </div>
        </section>

    {{-- -------------------------------------------------- --}}

{{-- 
    <a href="/booking/create" class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">➕ Booking Mobil</a>

    @foreach($cars as $car)
        <div class="mb-6 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white border border-gray-200">
            <div class="flex items-center p-2">
                {{-- Gambar Mobil di Sebelah Kiri --}}
                {{-- <div class="w-[120px] h-[60px] bg-gray-100 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                </div> --}}

                {{-- Informasi Mobil di Sebelah Kanan --}}
                {{-- <div class="w-2/3 p-6 flex flex-col justify-between">
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
    @endforeach --}}
    {{-- <a href="/my-bookings" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">📋 Lihat Booking Saya</a> --}}
    @include('includes.navigation')
@endsection


@section('scripts')
@endsection
