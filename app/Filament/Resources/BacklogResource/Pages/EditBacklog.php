<?php

namespace App\Filament\Resources\BacklogResource\Pages;

use App\Filament\Resources\BacklogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBacklog extends EditRecord
{
    protected static string $resource = BacklogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
