<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Post;

class BookmarkController extends Controller
{
    /**
    * Create a new controller instance
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('auth');
    }



    /**
    * Create a bookmark
    */
    public function store (Request $request)
    {
      $post_id = $request['post_id'];
      $user = Auth::user();
      $post = Post::find($post_id);

      // Dont attach bookmark if user already has bookmarked the post
      if (!$user->bookmarks->contains($post)) {
        $user->bookmarks()->attach($post_id);
      }
    }

    /**
    * Delete a bookmark
    */
    public function destroy ($id)
    {
      $user = Auth::user();
      $user->bookmarks()->detach($id);
    }
}
