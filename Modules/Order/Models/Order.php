<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Address\Models\Address;
use Modules\Client\Models\Client;
use Modules\Order\Database\factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    const STATUS_WAITING = 'waiting';
    const STATUS_PENDING = 'pending';
    const STATUS_SHIPPING = 'shipping';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELED = 'canceled';
    const statuses = [
        self::STATUS_WAITING,
        self::STATUS_PENDING,
        self::STATUS_SHIPPING,
        self::STATUS_DELIVERED,
        self::STATUS_CANCELED
    ];

    protected $fillable = [
        "sku",
        "client_id",
        "address_id",
        "shipping_price",
        "shipping_method",
        "status",
        "paid_at",
    ];

    protected $appends = [
        'pure_price'
    ];

    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function purePrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                $sum = 0;
                foreach ($this->items as $item) {
                    $sum += $item->fee * $item->qty;
                }
                return $sum;
            }
        );
    }

    public function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->pure_price + $this->shipping_price
        );
    }
}
