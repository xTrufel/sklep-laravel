<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('code')
                    ->label('Kod rabatowy')
                    ->required(),

                Select::make('type')
                    ->label('Typ rabatu')
                    ->options([
                        'percent' => 'Procentowy',
                        'fixed' => 'Kwotowy',
                    ])
                    ->required(),

                TextInput::make('value')
                    ->label('Wartość rabatu')
                    ->numeric()
                    ->required(),

                TextInput::make('min_cart_value')
                    ->label('Minimalna wartość koszyka')
                    ->numeric(),

                TextInput::make('usage_limit')
                    ->label('Limit użyć')
                    ->numeric(),

                Toggle::make('active')
                    ->label('Aktywny')
                    ->default(true),

            ]);
    }
}
