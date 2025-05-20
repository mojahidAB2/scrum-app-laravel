<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserStoryResource\Pages;
use App\Filament\Resources\UserStoryResource\RelationManagers;
use App\Models\UserStory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserStoryResource extends Resource
{
    protected static ?string $model = UserStory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('titre')
                ->label('Titre')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required()
                ->maxLength(1000),

            Forms\Components\Select::make('backlog_id')
                ->label('Backlog')
                ->relationship('backlog', 'titre') // خاص تكون العلاقة معرفّة فـ UserStory model
                ->searchable()
                ->required(),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('titre')->label('Titre')->searchable(),
            Tables\Columns\TextColumn::make('description')->label('Description')->limit(50),
            Tables\Columns\TextColumn::make('backlog.titre')->label('Backlog'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
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
            'index' => Pages\ListUserStories::route('/'),
            'create' => Pages\CreateUserStory::route('/create'),
            'edit' => Pages\EditUserStory::route('/{record}/edit'),
        ];
    }
}
