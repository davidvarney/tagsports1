<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'parent_comment_id', 'title', 'content'
    ];

    /**
       RELATIONSHIPS
     */

        public function post()
        {
            return $this->belongsTo('App\Post');
        }

        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function parent_comment()
        {
            return $this->belongsTo('App\Comment', 'parent_comment_id');// ??? NEED TO CREATE A PIVOT TABLE FOR THIS: child_comment_parent_comment
        }

        public function child_comments()
        {
            return $this->hasMany('App\Comment', 'id', 'parent_comment_id');
        }

    /**
       METHODS
     */
}
