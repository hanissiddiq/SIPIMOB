<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use App\Models\Booking;

// use Filament\Tables\Actions\Action;
// use Filament\Tables\Columns\BadgeColumn;
// use Filament\Actions\BulkActionGroup;
// use Filament\Actions\DeleteBulkAction;
// use Filament\Actions\EditAction;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                Tables\Columns\TextColumn::make('car.name')
                    ->label('Mobil')
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_date')->date(),
                Tables\Columns\TextColumn::make('end_date')->date(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                        'secondary' => 'dikembalikan',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Booking $record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (Booking $record) {

                        $bentrok = Booking::query()
                            ->where('car_id', $record->car_id)
                            ->where('status', 'approved')
                            ->where(function ($query) use ($record) {
                                $query->where('start_date', '<=', $record->end_date)
                                      ->where('end_date', '>=', $record->start_date);
                            })
                            ->exists();

                        if ($bentrok) {
                            Notification::make()
                                ->title('Booking bentrok dengan jadwal lain')
                                ->danger()
                                ->send();
                            return;
                        }

                        $record->update(['status' => 'approved']);
                        $record->car()->update(['status' => 'tidak_tersedia']);

                        Notification::make()
                            ->title('Booking disetujui')
                            ->success()
                            ->send();
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Booking $record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (Booking $record) {
                        $record->update(['status' => 'rejected']);

                        Notification::make()
                            ->title('Booking ditolak')
                            ->danger()
                            ->send();
                    }),
            ]);
    }
}
