<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Modules\Address\Models\Estate;
use Modules\Address\Models\Zone;
use Closure;
use Livewire\Component as Livewire;


class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('zone_id')
                    ->options(Zone::all()->pluck('name', 'id'))
                    ->required()
                    ->label('Zone')
                    ->live(),
                Forms\Components\Select::make('estate_id')
                    ->options(fn (Get $get): Collection => Estate::query()
                        ->where('zone_id', $get('zone_id'))
                        ->pluck('name', 'id'))
                    ->label('Estate')
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->rows(5)
                    ->required(),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('zone.name')
                    ->label('Zone'),
                Tables\Columns\TextColumn::make('estate.name')
                    ->label('Estate'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('postal_code'),
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
