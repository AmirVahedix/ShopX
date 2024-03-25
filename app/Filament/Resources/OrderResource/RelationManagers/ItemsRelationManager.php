<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = "محصولات";

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('product.title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('variant.color_name')
                    ->label('Color')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('variant.warranty')
                    ->label('Warranty')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('variant.fee')
                    ->money()
                    ->label('Fee')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('qty')
                    ->label('Quantity')
                    ->translateLabel(),

            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }
}
