<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search) {
            $posts = Post::where('author', 'LIKE', "%{$search}%")->latest()->get();
        } else {
            $posts = Post::latest()->get();
        }

        return Inertia::render('Posts/Posts', [
            'posts' => $posts,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/CreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response('Must upload file.', 400);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string|max:999',
            'image' => 'mimes:jpeg,png'
        ]);

        $request->file('file')->store('post', 'public');
        $post = new Post([
            "title" => $request->get('title'),
            "body" => $request->get('body'),
            "author" => $request->get('author'),
            "file_path" => $request->file->hashName()
        ]);
        $post->save();

        return redirect(route('posts.show', ['post' => $post->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts/PostDetails', [
            'post' => $post,
            'comments' => $post->comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/EditPost', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string|max:999',
        ]);
        $post->update($validated);

        return redirect(route('posts.show', ['post' => $post->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        error_log('delete?');
        $post->delete();

        return redirect(route('posts.index'));
    }
}
