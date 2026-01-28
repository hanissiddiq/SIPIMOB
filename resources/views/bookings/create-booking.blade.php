

@extends('layouts.template')
@section('content')

<div id="Background" class="absolute top-0 w-full h-[570px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
        <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
            <a href="{{ route('list-car') }}" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
            </a>
            <p class="font-semibold">Form Booking</p>
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

            <div class="card">
                <div class="rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">

                    @if(session('error'))
                        <p style="color:red">{{ session('error') }}</p>
                    @endif

                    <form method="POST" action="/booking">
                    @csrf

                    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Mobil</label>
                    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                    <select name="car_id" class="appearance-none outline-none w-full bg-white pl-8" required>
                        <option value="">-- Pilih Mobil --</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">
                                {{ $car->name }} - {{ $car->brand }}
                            </option>
                        @endforeach
                    </select>
                    </label>

                <br>
                    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Tanggal Mulai</label>
                    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                    <input class="relative w-full" type="date" name="start_date" required>
                    </label>

                <br>
                    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Tanggal Selesai</label>
                    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                    <input class="relative w-full" type="date" name="end_date" required>
                    </label>

                <br>
                    <button type="submit" class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">
                        Kirim Booking
                    </button>
                </form>

                </div>
            </div>

        </section>

{{-- ================== Start Codingan Lama ================== --}}
{{-- <h2>Form Booking Mobil</h2>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif --}}


{{-- <div class="flex flex-col w-full gap-2">
                        <p class="font-semibold">Choose City</p>
                        <label
                            class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                            <img src="assets/images/icons/location.svg"
                                class="absolute w-5 h-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5"
                                alt="icon">
                            <select name="city" id="" class="appearance-none outline-none w-full bg-white pl-8">
                                <option value="" hidden>Select city</option>

                                @foreach ($cities as $city)
                                    <option value="{{ $city->slug }}">{{ $city->name }}</option>
                                @endforeach

                            </select>
                            <img src="assets/images/icons/arrow-down.svg" class="w-5 h-5" alt="icon">
                        </label>
                    </div> --}}


                    {{-- ------------------- --}}
{{-- <div class="flex flex-col w-full gap-2 p-4">
<form method="POST" action="/booking">
    @csrf

    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Mobil</label>
    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
    <select name="car_id" class="appearance-none outline-none w-full bg-white pl-8" required>
        <option value="">-- Pilih Mobil --</option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}">
                {{ $car->name }} - {{ $car->brand }}
            </option>
        @endforeach
    </select>
    </label>

<br>
    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Tanggal Mulai</label>
    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
    <input type="date" name="start_date" required>
    </label>

<br>
    <label class="relative flex items-center w-full gap-2 bg-white transition-all duration-300">Tanggal Selesai</label>
    <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
    <input type="date" name="end_date" required>
    </label>

<br>
    <button type="submit" class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">
        Kirim Booking
    </button>
</form>
</div> --}}
{{-- ================== End Codingan Lama ================== --}}


@include('includes.navigation')
@endsection
@section('scripts')
@endsection

