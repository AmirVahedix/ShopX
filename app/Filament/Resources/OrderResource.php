<?php

namespace App\Filament\Resources;

use App\Filament\Filters\OrderSkuFilter;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Order\Models\Order;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $label = "سفارش";

    protected static ?string $pluralLabel = "سفارشات";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sku')
                    ->readOnly()
                    ->translateLabel(),
                Forms\Components\Select::make('status')
                    ->options([
                        Order::STATUS_CANCELED => __(Order::STATUS_CANCELED),
                        Order::STATUS_WAITING => __(Order::STATUS_WAITING),
                        Order::STATUS_PENDING => __(Order::STATUS_PENDING),
                        Order::STATUS_SHIPPING => __(Order::STATUS_SHIPPING),
                        Order::STATUS_DELIVERED => __(Order::STATUS_DELIVERED)
                    ])
                    ->translateLabel(),
                Forms\Components\TextInput::make('shipping_method')
                    ->readOnly()
                    ->translateLabel(),
                Forms\Components\TextInput::make('shipping_price')
                    ->readOnly()
                    ->translateLabel()
                    ->formatStateUsing(fn (string $state): string => number_format($state). " تومان"),
                Forms\Components\TextInput::make('pure_price')
                    ->readOnly()
                    ->translateLabel()
                    ->formatStateUsing(fn (string $state): string => number_format($state). " تومان"),
                Forms\Components\TextInput::make('total_price')
                    ->readOnly()
                    ->translateLabel()
                    ->formatStateUsing(fn (string $state): string => number_format($state). " تومان"),
                Forms\Components\TextInput::make('created_at')
                    ->readOnly()
                    ->formatStateUsing(fn (string $state): string => jdate($state)->format('Y/m/d'))
                    ->label('Order Date')
                    ->translateLabel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sku')
                    ->searchable()
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('client.name')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Order::STATUS_CANCELED => 'danger',
                        Order::STATUS_WAITING => 'warning',
                        Order::STATUS_PENDING => 'info',
                        Order::STATUS_SHIPPING => 'gray',
                        Order::STATUS_DELIVERED => 'success'
                    })
                    ->formatStateUsing(fn (string $state): string => __($state))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->formatStateUsing(fn (string $state): string => jdate($state)->format('d F'))
                    ->translateLabel()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        Order::STATUS_CANCELED => __(Order::STATUS_CANCELED),
                        Order::STATUS_WAITING => __(Order::STATUS_WAITING),
                        Order::STATUS_PENDING => __(Order::STATUS_PENDING),
                        Order::STATUS_SHIPPING => __(Order::STATUS_SHIPPING),
                        Order::STATUS_DELIVERED => __(Order::STATUS_DELIVERED)
                    ])
                    ->translateLabel(),
            ])
            ->actions([])
            ->bulkActions([])
            ->defaultSort('paid_at', 'desc')
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('paid_at'));
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
            RelationManagers\ClientRelationManager::class,
            RelationManagers\AddressRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
