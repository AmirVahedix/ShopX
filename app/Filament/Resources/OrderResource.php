<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
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
                    ->formatStateUsing(function (string $state): string {
                          return jdate($state)->format('d F');
                    })
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        Order::STATUS_CANCELED => Order::STATUS_CANCELED,
                        Order::STATUS_WAITING => Order::STATUS_WAITING,
                        Order::STATUS_PENDING => Order::STATUS_PENDING,
                        Order::STATUS_SHIPPING => Order::STATUS_SHIPPING,
                        Order::STATUS_DELIVERED => Order::STATUS_DELIVERED
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('paid_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
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
}
