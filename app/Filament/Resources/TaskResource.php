<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Tâches';
    protected static ?string $pluralLabel = 'Tâches';
    protected static ?string $modelLabel = 'Tâche';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Titre')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Description'),

            Forms\Components\DatePicker::make('start_date')
                ->label('Date de début'),

            Forms\Components\DatePicker::make('end_date')
                ->label('Date de fin'),

            Forms\Components\Select::make('status')
                ->label('Statut')
                ->options([
                    'à faire' => 'À faire',
                    'en cours' => 'En cours',
                    'terminé' => 'Terminé',
                ])
                ->default('à faire')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->label('Titre')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('status')->label('Statut')->badge()->color(fn (string $state): string => match ($state) {
                'à faire' => 'gray',
                'en cours' => 'warning',
                'terminé' => 'success',
            }),
            Tables\Columns\TextColumn::make('start_date')->label('Début')->date(),
            Tables\Columns\TextColumn::make('end_date')->label('Fin')->date(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
