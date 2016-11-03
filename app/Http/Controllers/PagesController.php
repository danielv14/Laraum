<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

class PagesController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('pages.index', compact('posts'));
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
      return view('pages.user', compact('user'));
    }
}
