<?php

namespace App\Models;

use App\Models\CommentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];

    protected $primaryKey = 'id';


    /**
     * @var mixed
     */

    /**
     * @var mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id');
    }

    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
