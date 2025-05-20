<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Filament\Resources\AdminResource\Pages;

class AdminResource extends Resource
{

public static function getPages(): array
{
    return [
        'index' => Pages\DashboardOverview::route('/'),
    ];
}

}
