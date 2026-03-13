<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('status')
                    ->label('Status zamówienia')
                    ->options([
                        'new' => 'Nowe',
                        'paid' => 'Opłacone',
                        'processing' => 'W realizacji',
                        'shipped' => 'Wysłane',
                        'completed' => 'Zrealizowane',
                        'cancelled' => 'Anulowane',
                    ])
                    ->required(),

            ]);
    }
}
