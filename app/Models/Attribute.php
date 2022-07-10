<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property int $type
 * @property string $value
 * @mixin \Eloquent
 */
class Attribute extends Model
{
    use HasFactory;

    public const TYPE_LENGTH = 1;
    public const TYPE_WIDTH = 2;
    public const TYPE_WEIGHT = 3;

    public const TYPE_LIST = [
        self::TYPE_LENGTH => 'Длина',
        self::TYPE_WIDTH => 'Ширина',
        self::TYPE_WEIGHT => 'Вес',
    ];

    protected $table = 'catalog_attributes';

    public $timestamps = true;

    protected $appends = ['type_name'];

    protected $guarded = ['id'];


    public function getTypeNameAttribute(): string
    {
        return self::TYPE_LIST[$this->type];
    }

    public function isLength(): bool
    {
        return $this->type === self::TYPE_LENGTH;
    }

    public function isWidth(): bool
    {
        return $this->type === self::TYPE_WIDTH;
    }

    public function isWeighT(): bool
    {
        return $this->type === self::TYPE_WEIGHT;
    }
}
