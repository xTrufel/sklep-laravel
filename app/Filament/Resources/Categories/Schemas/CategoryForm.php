<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Nazwa kategorii')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),

                Textarea::make('description')
                    ->label('Opis kategorii')
                    ->rows(3),

            ]);
    }
}
