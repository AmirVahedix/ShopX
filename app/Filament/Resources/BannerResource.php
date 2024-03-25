<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Banner\Models\Banner;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $label = "بنر";

    protected static ?string $pluralLabel = "بنر ها";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->translateLabel(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->translateLabel(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->translateLabel(),
                Forms\Components\Select::make('type')
                    ->options([
                        Banner::TYPE_FULL_WIDTH => __(Banner::TYPE_FULL_WIDTH),
                        Banner::TYPE_HALF_WIDTH => __(Banner::TYPE_HALF_WIDTH)
                    ])
                    ->translateLabel(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->translateLabel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('type')
                    ->translateLabel()
                    ->formatStateUsing(fn (string $state): string => __($state))
            ])
            ->filters([
                //
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
