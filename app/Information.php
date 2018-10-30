<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Information
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string $preview
 * @property string $text
 * @property string $alias
 * @property string $is_published
 * @property string $published_at
 * @property-read \App\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information whereTitle($value)
 * @mixin \Eloquent
 */
class Information extends Model
{
    use AutoAliasTrait;

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'informations';

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
