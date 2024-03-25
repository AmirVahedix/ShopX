<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Article\Models\Article;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $label = "مطلب";
    protected static ?string $pluralLabel = "مطالب";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->translateLabel(),
                Forms\Components\TextInput::make('slug')
                    ->translateLabel(),
                Forms\Components\RichEditor::make('body')
                    ->columnSpan(2)
                    ->translateLabel(),
                Forms\Components\TextInput::make('meta_title')
                    ->translateLabel(),
                Forms\Components\Textarea::make('meta_description')
                    ->rows(3)
                    ->translateLabel(),
                Forms\Components\DatePicker::make('published_at')
                    ->default(now())
                    ->label(__('Publish Date')),
                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->translateLabel(),
                Forms\Components\TextInput::make('reading_time')
                    ->numeric()
                    ->label(__('Reading Time (Minutes)')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('views')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('published_at')
                    ->formatStateUsing(fn (string $state): string => jdate($state)->format('Y/m/d'))
                    ->label(__('Publish Date'))
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

//    public static function getNavigationLabel(): string
//    {
//        return 'مقالات';
//    }
}
