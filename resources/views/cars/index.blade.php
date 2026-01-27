
 <script src="https://cdn.tailwindcss.com"></script>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($cars as $car)
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">

            {{-- IMAGE (CONSISTENT SIZE) --}}
            <div class="h-48 w-full bg-gray-100 overflow-hidden">
                <img
                    src="{{ $car->image
                        ? asset('storage/' . $car->image)
                        : asset('images/no-car.png') }}"
                    alt="{{ $car->name }}"
                    class="h-full w-full object-cover"
                >
            </div>

            <div class="p-5 space-y-3">
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ $car->name }}
                    <span class="text-sm text-gray-500">• {{ $car->brand }}</span>
                </h3>

                {{-- STATUS BADGE --}}
                @if($car->status === 'tersedia')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        bg-green-100 text-green-700">
                        ● Tersedia
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        bg-red-100 text-red-700">
                        ● Tidak Tersedia
                    </span>
                @endif

                <div class="pt-4">
                    @if($car->status === 'tersedia')
                        <form method="POST" action="/booking/{{ $car->id }}">
                            @csrf
                            <button
                                class="w-full bg-green-600 hover:bg-green-700 text-white
                                font-semibold py-2 rounded-lg transition">
                                Booking Sekarang
                            </button>
                        </form>
                    @else
                        <button disabled
                            class="w-full bg-gray-200 text-gray-500 font-semibold py-2
                            rounded-lg cursor-not-allowed">
                            Tidak Bisa Dibooking
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>


