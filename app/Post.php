<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{

    use Sluggable;
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
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
    }

    /**
    * get user attached to a post
    */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
    * Check if user is the owner
    */
    public function isOwner($user)
    {
      return $this->user_id == $user->id;
    }

    /**
    * Return all posts attached to a user
    * also sort by latest
    */
    public function scopeCurrentUser($query, $id)
    {
      return $query->where('user_id', $id)->orderBy('created_at', 'desc');
    }
}
