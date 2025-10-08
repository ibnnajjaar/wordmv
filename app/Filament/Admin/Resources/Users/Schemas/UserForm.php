<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use App\Support\Enums\UserStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Details')
                       ->inlineLabel()
                       ->schema([
                           TextInput::make('name')
                                    ->required(),
                           TextInput::make('email')
                                    ->email()
                                    ->required(),
                           Select::make('roles')
                                 ->relationship('roles', 'description')
                                 ->preload()
                                 ->multiple(),
                           Select::make('status')
                                 ->options(UserStatus::labels())
                                 ->searchable(),
                       ])
                       ->columnSpan(1),
            ])->columns(1);
    }
}
