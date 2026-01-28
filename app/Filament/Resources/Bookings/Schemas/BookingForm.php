<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('car_id')
                    ->label('Car')
                    ->relationship('car', 'name')
                    ->required(),
                DatePicker::make('start_date')
                    ->native(false)
                    ->required()
                    ->displayFormat('d/m/Y'),
                DatePicker::make('end_date')
                    ->native(false)
                    ->required()
                    ->displayFormat('d/m/Y'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'dikembalikan' => 'Dikembalikan',
                    ]),
            ]);
    }
}
