<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Produkty';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Produkt'),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Ilość'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Cena')
                    ->suffix(' zł'),
            ]);
    }
}
