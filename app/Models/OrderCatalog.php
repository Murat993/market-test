<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @mixin \Eloquent
 */
class OrderCatalog extends Model
{
    use HasFactory;

    protected $table = 'orders_catalogs_map';

    public $timestamps = true;

    protected $guarded = ['id'];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'catalog_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }
}
