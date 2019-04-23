<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CatalogProduct
 *
 * @property int $id
 * @property int|null $catalog_id
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
 * @property-read \App\Catalog $catalog
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CatalogProductImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CatalogProduct[] $relativeProducts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct wherePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CatalogProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CatalogProduct extends Model
{
    use AutoAliasTrait;

    public const PER_PAGE = 15;
    /**
     * @var array
     */
    private $labels = [
        '' => 'Не выбрано',
        'sale' => 'Акция',
        'new' => 'Новинка'
    ];

    /**
     * @var array
     */
    protected $fillable = ['catalog_id', 'price', 'name', 'title', 'description', 'keywords', 'text', 'alias', 'label', 'is_published', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catalog()
    {
        return $this->hasOne('App\Catalog', 'id', 'catalog_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function relativeProducts()
    {
        return $this->belongsToMany(CatalogProduct::class, 'catalog_product_relatives', 'product_id', 'product_relative_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dopCatalogs()
    {
        return $this->belongsToMany(Catalog::class, 'catalog_dop_products', 'product_id', 'catalog_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tabs()
    {
        return $this->hasMany(CatalogProductTab::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function originTabs()
    {
        return $this->belongsToMany(Tab::class, 'catalog_product_tabs', 'product_id', 'tab_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\CatalogProductImage', 'product_id')->orderBy('pos');
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getLabelName(string $key)
    {
        return $this->labels[$key];
    }
}
