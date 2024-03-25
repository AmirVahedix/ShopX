<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Comment\Models\Comment;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $label = "نظر";

    protected static ?string $pluralLabel = "نظرات";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('text')
                    ->rows(5)
                    ->label('Comment')
                    ->translateLabel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->label('Client')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('product.title')
                    ->label('Product')
                    ->translateLabel(),
                Tables\Columns\IconColumn::make('approved_at')
                    ->boolean()
                    ->default(0)
                    ->label('Is Approved')
                    ->translateLabel(),
            ])
            ->filters([
                Tables\Filters\Filter::make('not_approved')
                    ->query(fn (Builder $query): Builder => $query->whereNull('approved_at'))
                    ->translateLabel()
            ])
            ->actions([
                Action::make('approve')
                    ->action(fn (Model $record) => $record->markAsApproved())
                    ->visible(fn (Model $record) => !$record->approved_at)
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->translateLabel(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
