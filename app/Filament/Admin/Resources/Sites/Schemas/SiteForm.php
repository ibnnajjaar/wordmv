<?php

namespace App\Filament\Admin\Resources\Sites\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;

class SiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Site Details')
                       ->inlineLabel()
                       ->schema([
                           TextInput::make('name')
                                    ->required(),
                           TextInput::make('domain')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                           Textarea::make('description')
                                   ->rows(3)
                                   ->nullable(),
                           Select::make('users')
                                 ->multiple()
                                 ->relationship('users', 'name')
                                 ->searchable()
                                 ->preload(),
                       ])
                       ->columnSpan(1),
            ])->columns(1);
    }
}
