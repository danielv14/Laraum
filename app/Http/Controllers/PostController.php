<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Auth;
use App\Post;

class PostController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->has('publish')) {
          $post->draft = false;
        } else if ($request->has('draft')) {
          $post->draft = true;
        }

        // save the post to authenticated user
        Auth::user()->posts()->save($post);

        // Flash session
        session()->flash('flash_message', 'Post has been created');
        session()->flash('alert-class', 'is-primary');


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->isOwner(Auth::user())) {
          return view('posts.edit', compact('post'));
        } else {
          return redirect('/');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
      $post = Post::findOrFail($id);
      // only let posts owner and logged in user update it
      if ($post->isOwner(Auth::user())) {
        // update as post
        if ($request->has('publish')) {
          $post->user()
            ->associate(Auth::user()->id)
            ->update([
              'title' => $request->title,
              'body' => $request->body,
              'draft' => false
            ]);
            session()->flash('flash_message', 'Post has been updated');
          // update as draft
        } else if ($request->has('draft')) {
          $post->user()
            ->associate(Auth::user()->id)
            ->update([
              'title' => $request->title,
              'body' => $request->body,
              'draft' => true
            ]);
            session()->flash('flash_message', 'Post has been updated as a draft');
          }

        // Flash session
        session()->flash('alert-class', 'is-primary');
        return redirect('/');

        // if authenticated user doesnt own the post
      } else {
        // Flash session
        session()->flash('flash_message', 'You are not the owner of that post');
        session()->flash('alert-class', 'is-danger');
        return redirect('/');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->isOwner(Auth::user())) {
          $post->delete();
          // Flash session
          session()->flash('flash_message', 'Post has been deleted');
          session()->flash('alert-class', 'is-primary');

          return redirect('/');
        } else {
          // Flash session
          session()->flash('flash_message', 'You are not the owner of that post');
          session()->flash('alert-class', 'is-danger');
          return redirect('/');
        }

    }
}
