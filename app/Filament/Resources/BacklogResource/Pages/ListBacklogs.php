<?php

namespace App\Filament\Resources\BacklogResource\Pages;

use App\Filament\Resources\BacklogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBacklogs extends ListRecords
{
    protected static string $resource = BacklogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
