<?php

namespace App\Filament\Admin\Resources\Activities\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\Activities\ActivityResource;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
