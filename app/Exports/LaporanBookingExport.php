<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanBookingExport implements FromCollection, WithHeadings
{
    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }

    public function collection()
    {
        return Booking::with('user')
    ->whereYear('start_date', $this->tahun)
    ->get()
    ->map(function ($booking) {
        return [
            'User' => $booking->user->name ?? '-',
            'Car' => $booking->car->name ?? '-',
            'Start Date' => $booking->start_date,
            'End Date' => $booking->end_date,
            'Status' => $booking->status,
        ];
    });
    }

    public function headings(): array
    {
        return [
            'Nama User',
            'Nama Mobil',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Status',
        ];
    }
}
