

@extends('layouts.template')
@section('content')
<div id="Background" class="absolute top-0 w-full h-[570px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
        <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
            <a href="{{ route('list-car') }}" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
            </a>
            <p class="font-semibold">My Booking</p>
            <div class="dummy-btn w-12"></div>
        </div>
        <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
            <div class="flex flex-col gap-[6px]">
                {{-- <h1 class="font-bold text-[32px] leading-[48px]">Search Result</h1>
                <p class="text-ngekos-grey">Tersedia  Kos</p> --}}
            </div>
        </div>
        {{-- ================ Result Cards ================ --}}
        <section id="Result" class=" relative flex flex-col gap-4 px-5 mt-5 mb-9">
            @foreach($bookings as $booking)
            <a href="details.html" class="card">
                <div class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
                    <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                        <img src="{{ asset('storage/' . $booking->car->image) }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <div class="flex flex-col gap-3 w-full">
                        <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $booking->car->name }} - BK 1940 PQ</h3>
                        <hr class="border-[#F1F2F6]">
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                            <p class="text-sm text-ngekos-grey">{{ $booking->car->color }}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                            <p class="text-sm text-ngekos-grey">{{ $booking->car->brand }}</p>
                        </div>
                        <hr class="border-[#F1F2F6]">
                        {{-- <span>Status:</span> --}}
                        <p class="font-semibold text-md text-ngekos-orange"><span class="text-sm text-ngekos-grey font-normal">Status: </span><b>
                                @if($booking->status === 'pending') ⏳ Menunggu Approval @endif
                                @if($booking->status === 'approved') ✅ Disetujui @endif
                                @if($booking->status === 'rejected') ❌ Ditolak @endif
                                @if($booking->status === 'dikembalikan') 🔁 Dikembalikan @endif
                            </b>
                        </p>
                        @if($booking->status === 'approved')
                            <form method="POST" action="/booking/{{ $booking->id }}/return">
                                @csrf
                                <button class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white text-md">Kembalikan Mobil</button>
                            </form>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
            @if($bookings->isEmpty())
                <p>Anda belum melakukan booking apapun.</p>
            @endif
        </section>

{{-- ================= start codingan lama =================== --}}
{{-- <h2>Booking Saya</h2>

@foreach($bookings as $booking)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">
        <strong>{{ $booking->car->name }}</strong><br>
        Status:
        <b>
            @if($booking->status === 'pending') ⏳ Menunggu Approval @endif
            @if($booking->status === 'approved') ✅ Disetujui @endif
            @if($booking->status === 'rejected') ❌ Ditolak @endif
            @if($booking->status === 'dikembalikan') 🔁 Dikembalikan @endif
        </b>

        @if($booking->status === 'approved')
            <form method="POST" action="/booking/{{ $booking->id }}/return">
                @csrf
                <button class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">Kembalikan Mobil</button>
            </form>
        @endif
    </div>
@endforeach
@if($bookings->isEmpty())
    <p>Anda belum melakukan booking apapun.</p>
@endif
<a href="{{ route('list-car') }}">Kembali ke Daftar Mobil</a> --}}
{{-- ================= end codingan lama =================== --}}


@include('includes.navigation')
@endsection
@section('scripts')
@endsection
