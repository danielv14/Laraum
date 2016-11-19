<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class LikesController extends Controller
{

    public function like ($id)
    {
      $post = Post::findOrFail($id);
      $post->likes = $post->likes + 1;
      $post->save();
    }

    public function unlike ($id)
    {
      $post = Post::findOrFail($id);
      $post->likes = $post->likes - 1;
      $post->save();
    }

}
