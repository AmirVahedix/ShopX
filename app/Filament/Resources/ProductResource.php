<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Brand\Models\Brand;
use Modules\Category\Models\Category;
use Modules\Product\Models\Product;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = "محصول";

    protected static ?string $pluralLabel = "محصولات";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->translateLabel(),
                Forms\Components\TextInput::make('slug')
                    ->unique('products', 'slug', ignoreRecord: true)
                    ->translateLabel(),
                Forms\Components\TextInput::make('model')
                    ->translateLabel(),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'title')
                    ->multiple()
                    ->searchable()
                    ->translateLabel(),
                Forms\Components\Checkbox::make('is_special_offer')
                    ->label('Special Offer')
                    ->translateLabel(),
                Forms\Components\Checkbox::make('is_best_seller')
                    ->label('Best Seller')
                    ->translateLabel(),
                Forms\Components\Select::make('brand_id')
                    ->options(Brand::query()->pluck('title', 'id'))
                    ->searchable()
                    ->label('Brand')
                    ->translateLabel(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpan(2)
                    ->translateLabel(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnail')
                    ->translateLabel(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                    ->collection('gallery')
                    ->multiple()
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel(),
//                Tables\Columns\TextColumn::make('brand.title'),
                Tables\Columns\TextColumn::make('variants_sum_stock')
                    ->sum('variants', 'stock')
                    ->label('Total Stock')
                    ->translateLabel(),
                Tables\Columns\IconColumn::make('is_special_offer')
                    ->boolean()
                    ->label('Special Offer')
                    ->translateLabel(),
                Tables\Columns\IconColumn::make('is_best_seller')
                    ->boolean()
                    ->label('Best Seller')
                    ->translateLabel(),
            ])
            ->defaultSort('created_at')
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
            RelationManagers\AttributesRelationManager::class,
            RelationManagers\VariantsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
