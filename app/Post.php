<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id', 'user_id', 'title', 'description', 'content'
    ];

    /**
       RELATIONSHIPS
     */

        public function blog()
        {
            return $this->belongsTo('App\Blog');
        }

        public function comments()
        {
            return $this->hasMany('App\Comment', 'post_id');
        }

    /**
       METHODS
     */
}
