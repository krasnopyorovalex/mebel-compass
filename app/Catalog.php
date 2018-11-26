<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Catalog
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string $text
 * @property string $alias
 * @property string $is_published
 * @property int $pos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Catalog[] $catalogs
 * @property-read \App\Image $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CatalogProduct[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    use AutoAliasTrait;

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'title', 'sub_title', 'description', 'keywords', 'text', 'alias', 'is_published', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function catalogs()
    {
        return $this->hasMany('App\Catalog', 'parent_id', 'id')->orderBy('pos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalog()
    {
        return $this->belongsTo('App\Catalog', 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dopProducts()
    {
        return $this->belongsToMany(CatalogProduct::class, 'catalog_dop_products', 'catalog_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\CatalogProduct')->with(['images' => function ($query) {
            return $query->where('is_published', '1');
        }])->orderBy('pos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function icon()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
