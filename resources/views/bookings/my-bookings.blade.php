<h2>Booking Saya</h2>

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
                <button>Kembalikan Mobil</button>
            </form>
        @endif
    </div>
@endforeach
@if($bookings->isEmpty())
    <p>Anda belum melakukan booking apapun.</p>
@endif
<a href="{{ route('list-car') }}">Kembali ke Daftar Mobil</a>
