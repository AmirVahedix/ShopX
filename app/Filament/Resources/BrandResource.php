<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Brand\Models\Brand;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $label = "برند";

    protected static ?string $pluralLabel = "برند ها";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->translateLabel(),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->translateLabel(),
                RichEditor::make('description')
                    ->columnSpan(2)
                    ->translateLabel(),
                Forms\Components\Checkbox::make('is_featuring')
                    ->label('Featuring')
                    ->translateLabel(),
                Textinput::make('order')
                    ->numeric()
                    ->translateLabel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('products_count')
                    ->counts('products')
                    ->translateLabel(),
                Tables\Columns\IconColumn::make('is_featuring')
                    ->boolean()
                    ->label('Featuring')
                    ->translateLabel(),
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
            ])
            ->defaultSort('order', 'desc');
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
