<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Forms;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Form;

use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;


use App\Exports\LaporanBookingExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Actions\Action;

class LaporanBooking extends Page implements Tables\Contracts\HasTable, Forms\Contracts\HasForms
{
    use Tables\Concerns\InteractsWithTable;
    use Forms\Concerns\InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    // protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedArchiveBoxArrowDown;

    // protected static string $view = 'filament.pages.laporan-booking';
    public function getView(): string
{
    return 'filament.pages.laporan-booking';
}
    protected static ?string $title = 'Laporan Booking';

    public $bulan;
    public $tahun;

    protected function getHeaderActions(): array
{
    return [
        Action::make('export')
            ->label('Download Excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function () {
                return Excel::download(
                    new LaporanBookingExport($this->tahun),
                    'laporan-booking-' . $this->tahun . '.xlsx'
                );
            }),
    ];
}


    public function mount(): void
    {
        $this->bulan = now()->month;
        $this->tahun = now()->year;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('bulan')
                ->label('Bulan')
                ->options([
                    1 => 'Januari',
                    2 => 'Februari',
                    3 => 'Maret',
                    4 => 'April',
                    5 => 'Mei',
                    6 => 'Juni',
                    7 => 'Juli',
                    8 => 'Agustus',
                    9 => 'September',
                    10 => 'Oktober',
                    11 => 'November',
                    12 => 'Desember',
                ])
                ->live(),

            Forms\Components\Select::make('tahun')
                ->label('Tahun')
                ->options(
                    collect(range(date('Y') - 10, date('Y') + 1))
                        ->mapWithKeys(fn ($year) => [$year => $year])
                )
                ->live(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Booking::query()
            ->with(['user', 'car'])
            ->whereMonth('start_date', $this->bulan)
            ->whereYear('start_date', $this->tahun);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('User')
                ->searchable(),

            Tables\Columns\TextColumn::make('car.name')
                ->label('Mobil'),

            Tables\Columns\TextColumn::make('start_date')
                ->label('Tanggal Mulai')
                ->date(),

            Tables\Columns\TextColumn::make('end_date')
                ->label('Tanggal Selesai')
                ->date(),

            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                    'secondary' => 'dikembalikan',
                ]),
        ];
    }
}
