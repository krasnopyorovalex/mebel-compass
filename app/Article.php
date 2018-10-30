<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property string $preview
 * @property string $alias
 * @property string $is_published
 * @property \Illuminate\Support\Carbon $published_at
 * @property-read \App\Image $image
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 */
class Article extends Model
{

    use AutoAliasTrait;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'description', 'keywords', 'text', 'preview', 'alias', 'is_published', 'published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
