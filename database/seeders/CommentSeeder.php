<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::first();
        $comment = new Comment(['body' => 'Ut porttitor est vel sagittis elementum. Suspendisse purus ante, posuere nec dignissim eu, interdum sed risus. Pellentesque lobortis congue eros, vitae pharetra tortor.']);
        $post->comments()->save($comment);
    }
}
