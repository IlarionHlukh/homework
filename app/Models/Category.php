<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method static select(string $string, string $string1)
 */
class Category extends Model
{
    // Mass assigned
    protected $fillable = ['slug','title','content', 'parent_id', 'published', 'created_by', 'modified_by'];
    // Mutators
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }
    // Get children category
    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

}
