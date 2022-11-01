<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
        ]);
        $post = Post::find($request->input('post_id'));
        $post->comments()->create($validated);

        return redirect(route('posts.show', ['post' => $post->id]));
    }
}
