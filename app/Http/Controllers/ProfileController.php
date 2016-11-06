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
      $posts = Post::currentUser($user->id)->get();
      return view('profile.index', compact(['user', 'posts']));
    }
}
