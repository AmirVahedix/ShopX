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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sku')
                    ->readOnly(),
                Forms\Components\Select::make('status')
                    ->options([
                        Order::STATUS_CANCELED => Order::STATUS_CANCELED,
                        Order::STATUS_WAITING => Order::STATUS_WAITING,
                        Order::STATUS_PENDING => Order::STATUS_PENDING,
                        Order::STATUS_SHIPPING => Order::STATUS_SHIPPING,
                        Order::STATUS_DELIVERED => Order::STATUS_DELIVERED
                    ]),
                Forms\Components\TextInput::make('created_at')
                    ->readOnly()
                    ->formatStateUsing(fn (string $state): string => jdate($state)->format('Y/m/d'))
                    ->label('Order Date')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sku'),
                Tables\Columns\TextColumn::make('client.name'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Order::STATUS_CANCELED => 'danger',
                        Order::STATUS_WAITING => 'warning',
                        Order::STATUS_PENDING => 'info',
                        Order::STATUS_SHIPPING => 'gray',
                        Order::STATUS_DELIVERED => 'success'
                    }),
                Tables\Columns\TextColumn::make('paid_at')
                    ->formatStateUsing(fn (string $state): string => jdate($state)->format('d F'))
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        Order::STATUS_CANCELED => Order::STATUS_CANCELED,
                        Order::STATUS_WAITING => Order::STATUS_WAITING,
                        Order::STATUS_PENDING => Order::STATUS_PENDING,
                        Order::STATUS_SHIPPING => Order::STATUS_SHIPPING,
                        Order::STATUS_DELIVERED => Order::STATUS_DELIVERED
                    ]),
                Tables\Filters\Filter::make('sku')
                    ->form([
                        Forms\Components\TextInput::make('sku')->numeric()
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['sku'],
                                fn (Builder $query, $sku): Builder => $query->where('sku', $sku),
                            );
                    })
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
