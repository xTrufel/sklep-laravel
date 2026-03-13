<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID'),

                TextColumn::make('user.name')
                    ->label('Klient'),

                TextColumn::make('total')
                    ->label('Kwota')
                    ->suffix(' zł'),

                TextColumn::make('status')
                    ->label('Status'),

                TextColumn::make('created_at')
                    ->label('Data')
                    ->dateTime(),
                
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()

            ]);
    }
}
