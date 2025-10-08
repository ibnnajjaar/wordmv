<?php

namespace App\Filament\Admin\Resources\Sites;

use UnitEnum;
use BackedEnum;
use App\Models\Site;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Sites\Pages\EditSite;
use App\Filament\Admin\Resources\Sites\Pages\ViewSite;
use App\Filament\Admin\Resources\Sites\Pages\ListSites;
use App\Filament\Admin\Resources\Sites\Pages\CreateSite;
use App\Filament\Admin\Resources\Sites\Schemas\SiteForm;
use App\Filament\Admin\Resources\Sites\Tables\SitesTable;
use App\Filament\Admin\Resources\Sites\Schemas\SiteInfolist;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static string | UnitEnum | null $navigationGroup = 'Content Management';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    public static function form(Schema $schema): Schema
    {
        return SiteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SiteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SitesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSites::route('/'),
            'create' => CreateSite::route('/create'),
            'view' => ViewSite::route('/{record}'),
            'edit' => EditSite::route('/{record}/edit'),
        ];
    }
}
