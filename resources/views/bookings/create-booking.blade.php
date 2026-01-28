<h2>Form Booking Mobil</h2>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/booking">
    @csrf

    <label>Mobil</label><br>
    <select name="car_id" required>
        <option value="">-- Pilih Mobil --</option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}">
                {{ $car->name }} - {{ $car->brand }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Tanggal Mulai</label><br>
    <input type="date" name="start_date" required>

    <br><br>

    <label>Tanggal Selesai</label><br>
    <input type="date" name="end_date" required>

    <br><br>

    <button>Kirim Booking</button>
</form>
