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
class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';

    public $timestamps = true;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'catalog_id', 'id');
    }
}
