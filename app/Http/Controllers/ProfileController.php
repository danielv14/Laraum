<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Post;

class ProfileController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $bookmarks = $user->bookmarks;
      $posts = Post::currentUser($user->id)->published()->get();
      $drafts = Post::currentUser($user->id)->draft()->get();
      return view('profile.index', compact(['user', 'posts', 'drafts', 'bookmarks']));
    }

    public function drafts()
    {
      $user = Auth::user();
    public function bookmarks()
    {
      $user = Auth::user();
      $bookmarks = $user->bookmarks()->latest()->get();
      $posts = Post::currentUser($user->id)->published()->get();
      $drafts = Post::currentUser($user->id)->draft()->get();
      return view('profile.bookmarks', compact(['user', 'posts', 'drafts', 'bookmarks']));
    }
}
