<?php

namespace App\Filament\Admin\Resources\Sites\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class SiteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Site Details')
                       ->schema([
                           TextEntry::make('name')->inlineLabel(),
                           TextEntry::make('domain')->inlineLabel(),
                           TextEntry::make('description')->inlineLabel(),
                           TextEntry::make('users.name')
                                    ->label('Site Users')
                                    ->inlineLabel()
                                    ->listWithLineBreaks(),
                           TextEntry::make('updated_at')->inlineLabel()->dateTime(),
                           TextEntry::make('created_at')->inlineLabel()->dateTime(),
                       ]),
            ])->columns(1);
    }
}
