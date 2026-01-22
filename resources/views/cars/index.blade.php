@foreach($cars as $car)
    <div>
        <h3>{{ $car->name }} - {{ $car->brand }}</h3>
        <p>Status: {{ $car->status }}</p>

        @if($car->status === 'tersedia')
            <form method="POST" action="/booking/{{ $car->id }}">
                @csrf
                <button>Booking</button>
            </form>
        @else
            <span>❌ Tidak Tersedia</span>



        @endif
    </div>
@endforeach
