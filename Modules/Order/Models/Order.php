<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        "status",
        "paid_at",
    ];

    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
