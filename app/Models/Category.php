<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $depth
 * @property Catalog $parent
 * @property Catalog[] $children
 * @property Attribute[] $attributes
 * @property-read int|null $children_count
 * @mixin \Eloquent
 */
class Category extends Model
{
    use NodeTrait, HasFactory;

    protected $table = 'categories';

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $hidden = ['_lft', '_rgt'];

    public static function categoryTree($categories, $prefix = '', &$tree = []): array
    {
        foreach ($categories as $category) {
            $tree[$category->id] = $prefix.' '.$category->name;
            self::categoryTree($category->children, $prefix.'-', $tree);
        }
        return $tree;
    }
}
