<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $title = "رنگ، گارانتی، انبار";

    protected static ?string $label = "";

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ColorPicker::make('color_hash')
                    ->label('Color')
                    ->translateLabel(),
                Forms\Components\TextInput::make('color_name')
                    ->translateLabel(),
                Forms\Components\TextInput::make('warranty')
                    ->translateLabel(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->translateLabel(),
                Forms\Components\TextInput::make('old_price')
                    ->numeric()
                    ->translateLabel(),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->translateLabel()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\ColorColumn::make('color_hash')
                    ->label('Color')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('color_name')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('warranty')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('price')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('old_price')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('stock')
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
