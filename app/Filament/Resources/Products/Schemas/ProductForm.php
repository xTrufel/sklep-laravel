<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Nazwa produktu')
                    ->required(),

                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),

                Textarea::make('description')
                    ->label('Opis produktu')
                    ->rows(4),
                
                TextInput::make('price_net')
                    ->label('Cena netto')
                    ->numeric()
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {

                        $vat = $get('vat_rate') ?? 23;

                        if ($state) {
                            $gross = $state * (1 + $vat / 100);
                            $set('price_gross', round($gross,2));
                        }

                    }),

                TextInput::make('vat_rate')
                    ->label('VAT (%)')
                    ->numeric()
                    ->default(23)
                    ->live(onBlur: true),

                TextInput::make('price_gross')
                    ->label('Cena brutto')
                    ->numeric()
                    ->readOnly(),
                TextInput::make('stock')
                    ->label('Stan magazynowy')
                    ->numeric()
                    ->required(),

                Select::make('category_id')
                    ->label('Kategoria')
                    ->relationship('category', 'name')
                    ->required(),

                FileUpload::make('image')
                    ->directory('produkty')
                    ->image()
                    ->disk('public')
                    ->visibility('public'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Szkic',
                        'published' => 'Opublikowany',
                    ])
                    ->required(),

            ]);
    }
}
