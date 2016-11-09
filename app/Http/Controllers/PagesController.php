<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

class PagesController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->published()->get();
      $popular = Post::published()->inRandomOrder()->published()->take(4)->get();
      return view('pages.index', compact(['posts', 'popular']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('pages.post', compact('post'));
    }

    public function user($id)
    {
      $user = User::findOrFail($id);
      $posts = $user->posts()->published()->latest()->get();
      return view('pages.user', compact(['user', 'posts']));
    }
}
