<?php

namespace App\Filament\Admin\Resources\Sites\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Sites\SiteResource;

class CreateSite extends CreateRecord
{
    protected static string $resource = SiteResource::class;
}
