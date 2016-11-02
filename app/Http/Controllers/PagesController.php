<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PagesController extends Controller
{
    public function index()
    {
      $posts = Post::all();
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
}
