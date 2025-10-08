<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Details')
                       ->schema([
                           TextEntry::make('name')->inlineLabel(),
                           TextEntry::make('email')->inlineLabel(),
                           TextEntry::make('roles.description')
                                    ->listWithLineBreaks()
                                    ->inlineLabel(),
                           TextEntry::make('status')
                                    ->badge()
                                    ->color(fn ($state) => $state->getColor())
                                    ->formatStateUsing(fn ($state) => $state->getLabel())
                                    ->inlineLabel(),
                           TextEntry::make('updated_at')->inlineLabel()
                                    ->dateTime(),
                           TextEntry::make('created_at')->inlineLabel()
                                    ->dateTime(),
                       ]),
            ])->columns(1);
    }
}
