<?php

namespace App\Filament\Resources\BacklogResource\Pages;

use App\Filament\Resources\BacklogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBacklog extends CreateRecord
{
    protected static string $resource = BacklogResource::class;
}
