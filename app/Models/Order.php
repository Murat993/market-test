<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property integer $status
 * @property integer $user_id
 * @property string $email
 * @property string $slug
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    public const STATUS_NEW = 1;
    public const STATUS_FRAMED = 2;
    public const STATUS_CLOSED = 3;

    public const STATUS_LIST = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_FRAMED => 'Оформленный',
        self::STATUS_CLOSED => 'Закрыт',
    ];

    protected $table = 'orders';

    public $timestamps = true;

    protected $guarded = ['id'];

    public function ordersCatalogs()
    {
        return $this->hasMany(OrderCatalog::class, 'order_id', 'id');
    }

    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class, 'orders_catalogs_map', 'order_id', 'catalog_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTypeNameAttribute(): string
    {
        return self::STATUS_LIST[$this->status];
    }
    public function getFullUsernameAttribute(): string
    {
        if ($this->user_id) {
            $username = $this->client->name . ' (' . $this->client->email . ')';
        }  else {
            $username = $this->username . ' (' . $this->email . ')';
        }

        return $username;
    }

    public function isNew(): bool
    {
        return $this->status === self::STATUS_NEW;
    }

    public function isFramed(): bool
    {
        return $this->status === self::STATUS_FRAMED;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }
}
