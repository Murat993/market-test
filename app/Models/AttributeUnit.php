<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AttributeUnit
 *
 * @property int $id
 * @property string $name
 * @mixin \Eloquent
 */
class AttributeUnit extends Model
{
    protected $table = 'catalog_attribute_units';

    public $timestamps = false;

    protected $guarded = ['id'];
}
