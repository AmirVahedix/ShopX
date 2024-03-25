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

    protected static ?string $label = "آدرس";

    protected static ?string $pluralLabel = "آدرس ها";

    protected static ?string $modelLabel = "آدرس";

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('zone_id')
                    ->options(Zone::all()->pluck('name', 'id'))
                    ->required()
                    ->label('Zone')
                    ->live()
                    ->translateLabel(),
                Forms\Components\Select::make('estate_id')
                    ->options(fn (Get $get): Collection => Estate::query()
                        ->where('zone_id', $get('zone_id'))
                        ->pluck('name', 'id'))
                    ->label('Estate')
                    ->required()
                    ->translateLabel(),
                Forms\Components\Textarea::make('address')
                    ->rows(5)
                    ->required()
                    ->translateLabel(),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->translateLabel()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('zone.name')
                    ->label('Zone')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('estate.name')
                    ->label('Estate')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('address')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('postal_code')
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
