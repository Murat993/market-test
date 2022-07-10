<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CatalogUnits
 *
 * @property int $id
 * @property string $name
 * @mixin \Eloquent
 */
class CatalogUnits extends Model
{
    protected $table = 'catalog_attribute_units';

    public $timestamps = false;

    protected $guarded = ['id'];

}
