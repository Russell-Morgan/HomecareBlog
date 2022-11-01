<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mountains = Storage::disk('local')->get('img/mountains.jpg');
        Storage::disk('public')->put('post/mountains.jpg', $mountains);
        DB::table('posts')->insert([
            'title' => 'Trekking the Anna Purna',
            'author' => 'Stan Lee',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis ex ut odio ultrices scelerisque. Integer sed eros urna. Nullam vitae ante interdum, sagittis dui ac, congue mi. Fusce vulputate lectus id erat maximus interdum. Curabitur ac facilisis enim, pulvinar rhoncus ante. Maecenas turpis dolor, pretium id nisl eget, aliquam condimentum leo. Donec ut ultrices erat.

            Curabitur viverra rhoncus ligula, nec pharetra lorem imperdiet a. In hac habitasse platea dictumst. Morbi sodales, lacus vel ornare pulvinar, diam lectus ornare mi, sed feugiat ligula quam et est. Ut porttitor est vel sagittis elementum. Suspendisse purus ante, posuere nec dignissim eu, interdum sed risus. Pellentesque lobortis congue eros, vitae pharetra tortor.',
            'file_path' => 'mountains.jpg'
        ]);

        $valley = Storage::disk('local')->get('img/valley.png');
        Storage::disk('public')->put('post/valley.png', $valley);
        DB::table('posts')->insert([
            'title' => 'The FjallRaven Sweden Classic',
            'author' => 'Meryl Streep',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis ex ut odio ultrices scelerisque. Integer sed eros urna. Nullam vitae ante interdum, sagittis dui ac, congue mi. Fusce vulputate lectus id erat maximus interdum. Curabitur ac facilisis enim, pulvinar rhoncus ante. Maecenas turpis dolor, pretium id nisl eget, aliquam condimentum leo. Donec ut ultrices erat.

            Curabitur viverra rhoncus ligula, nec pharetra lorem imperdiet a. In hac habitasse platea dictumst. Morbi sodales, lacus vel ornare pulvinar, diam lectus ornare mi, sed feugiat ligula quam et est. Ut porttitor est vel sagittis elementum. Suspendisse purus ante, posuere nec dignissim eu, interdum sed risus. Pellentesque lobortis congue eros, vitae pharetra tortor.',
            'file_path' => 'valley.png'
        ]);

        $hills = Storage::disk('local')->get('img/hills.jpg');
        Storage::disk('public')->put('post/hills.jpg', $hills);
        DB::table('posts')->insert([
            'title' => 'Rainbow Range in Tweedsmuir, BC',
            'author' => 'Keanu Reeves',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis ex ut odio ultrices scelerisque. Integer sed eros urna. Nullam vitae ante interdum, sagittis dui ac, congue mi. Fusce vulputate lectus id erat maximus interdum. Curabitur ac facilisis enim, pulvinar rhoncus ante. Maecenas turpis dolor, pretium id nisl eget, aliquam condimentum leo. Donec ut ultrices erat.

            Curabitur viverra rhoncus ligula, nec pharetra lorem imperdiet a. In hac habitasse platea dictumst. Morbi sodales, lacus vel ornare pulvinar, diam lectus ornare mi, sed feugiat ligula quam et est. Ut porttitor est vel sagittis elementum. Suspendisse purus ante, posuere nec dignissim eu, interdum sed risus. Pellentesque lobortis congue eros, vitae pharetra tortor.',
            'file_path' => 'hills.jpg'
        ]);
    }
}
