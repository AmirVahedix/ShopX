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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('slug')
                    ->unique('products', 'slug', ignoreRecord: true),
                Forms\Components\TextInput::make('model'),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'title')
                    ->multiple()
                    ->searchable(),
                Forms\Components\Checkbox::make('is_special_offer')
                    ->label('Special Offer'),
                Forms\Components\Checkbox::make('is_best_seller')
                    ->label('Best Seller'),
                Forms\Components\Select::make('brand_id')
                    ->options(Brand::query()->pluck('title', 'id'))
                    ->searchable()
                    ->label('Brand'),
                Forms\Components\RichEditor::make('description')
                    ->columnSpan(2),
                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->collection('thumbnail'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                    ->collection('gallery')
                    ->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail'),
                Tables\Columns\TextColumn::make('title'),
//                Tables\Columns\TextColumn::make('brand.title'),
                Tables\Columns\TextColumn::make('variants_sum_stock')
                    ->sum('variants', 'stock')
                    ->label('Total Stock'),
                Tables\Columns\IconColumn::make('is_special_offer')
                    ->boolean()
                    ->label('Special Offer'),
                Tables\Columns\IconColumn::make('is_best_seller')
                    ->boolean()
                    ->label('Best Seller'),
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
