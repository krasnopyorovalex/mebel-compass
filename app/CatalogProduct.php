<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogProduct extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['catalog_id', 'name', 'title', 'description', 'keywords', 'text', 'alias', 'is_published', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catalog()
    {
        return $this->hasOne('App\Catalog', 'id', 'catalog_id');
    }

    public function relativeProducts()
    {
        return $this->belongsToMany(CatalogProduct::class, 'catalog_product_relatives', 'product_id', 'product_relative_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\CatalogProductImage', 'product_id')->orderBy('pos');
    }
}
