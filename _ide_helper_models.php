<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property int $type
 * @property string $value
 * @mixin \Eloquent
 * @property int $catalog_id
 * @property int $attribute_units_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $type_name
 * @method static \Database\Factories\AttributeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereAttributeUnitsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereValue($value)
 */
	class Attribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @mixin \Eloquent
 * @property string $description
 * @property string $price
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Category $category
 * @method static \Database\Factories\CatalogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereUpdatedAt($value)
 */
	class Catalog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CatalogUnits
 *
 * @property int $id
 * @property string $name
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogUnits newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogUnits newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogUnits query()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogUnits whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogUnits whereName($value)
 */
	class CatalogUnits extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $_lft
 * @property int $_rgt
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Category withoutRoot()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @mixin \Eloquent
 * @property int $status
 * @property string|null $username
 * @property string|null $email
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Catalog[] $catalogs
 * @property-read int|null $catalogs_count
 * @property-read \App\Models\User|null $client
 * @property-read string $full_username
 * @property-read string $type_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderCatalog[] $ordersCatalogs
 * @property-read int|null $orders_catalogs_count
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUsername($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @mixin \Eloquent
 * @property int $order_id
 * @property int $catalog_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Catalog[] $catalogs
 * @property-read int|null $catalogs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Database\Factories\OrderCatalogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderCatalog whereUpdatedAt($value)
 */
	class OrderCatalog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

