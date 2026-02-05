<?php

namespace App\Filament\Resources\Cars;

use App\Filament\Resources\Cars\Pages\ManageCars;
use App\Models\Car;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;


class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('cars')
                    ->imageEditorAspectRatios([
                        null,
                        '4:3',
                    ]),
                TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                TextInput::make('year')
                    ->required()
                    ->maxLength(4),
                TextInput::make('color')
                    ->required()
                    ->maxLength(255),
                TextInput::make('plate_number')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->options([
                        'tersedia' => 'Tersedia',
                        'tidak_tersedia' => 'Tidak Tersedia',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto Mobil')
                    ->disk('public')
                    ->height(60)
                    ->width(100)
                    ->square()
                    ->action(
                        fn ($record) => redirect('/storage/' . $record->image)
                    )
                    ->defaultImageUrl(asset('images/no-image.png')),     // bentuk kotak
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                TextColumn::make('year')
                    ->searchable(),
                TextColumn::make('color')
                    ->searchable(),
                TextColumn::make('plate_number')
                    ->searchable(),
                TextColumn::make('status')
                ->badge()
                ->color(fn ($state) => $state === 'tersedia' ? 'success' : 'danger'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCars::route('/'),
        ];
    }
}
