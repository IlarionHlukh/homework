<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;


/**
 * @method static select(string $string, string $string1)
 * @method static create(array $validated)
 * @method static latest()
 */
class Post extends Model
{

    // Set mass-assignable fields
    protected $fillable = ['title','category_id', 'user_id','image', 'content', 'slug'];

    protected $primaryKey = 'id';
    /**
     * @var mixed|string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('commentCount', function ($builder) {
            $builder->withCount('comments');
        });
    }
    public function getThreadedComments()
    {
        return $this->comments()->with('user')->get()->threaded();
    }
    public function addComment($attributes)
    {
        $comment = (new Comment)->forceFill($attributes);
        $comment->user_id = auth()->id();

        return $this->comments()->save($comment);
    }
}
