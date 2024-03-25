<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Category\Models\Category;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $label = "دسته بندی";

    protected static ?string $pluralLabel = "دسته بندی ها";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->translateLabel(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->translateLabel(),
                Forms\Components\Select::make('parent_id')
                    ->relationship('parent', 'title')
                    ->searchable()
                    ->nullable()
                    ->translateLabel(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('products_count')
                    ->counts('products')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('parent.title')
                    ->translateLabel(),
            ])
            ->filters([
                Tables\Filters\Filter::make('parents_only')
                    ->query(fn (Builder $query): Builder => $query->whereNull('parent_id'))
                    ->translateLabel(),
                Tables\Filters\SelectFilter::make('parent_id')
                    ->options(Category::query()->whereNull('parent_id')->pluck('title', 'id'))
                    ->label('Parent')
                    ->translateLabel()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('parent_id');
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
