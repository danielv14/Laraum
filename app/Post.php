<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * Attributes that are mass assignable
    *
    * @var array
    */
    protected $fillable = [
      'id', 'title', 'likes', 'body'
    ];

    /**
    * Attributes that are not mass assignable
    *
    * @var array
    */
    protected $guarded = [
      'user_id', 'slug'
    ];

    /**
    * get user attached to a post
    */
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
