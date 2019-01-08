<?php

use Illuminate\Database\Seeder;
use App\Posts;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new Posts;
        $post->titulo = 'Primeiro Post do Blog';
        $post->midia = 1;
        $post->media_file = 'blog/post1546553445.jpg';
        $post->body = '<p>Texto incrível.<br></p>';
        $post->save();

        $post = new Posts;
        $post->titulo = '2º Post do blog';
        $post->midia = 2;
        $post->media_file = 'https://www.youtube.com/watch?v=_PoDXNoHO4Y';
        $post->body = '<p>Stand-up<br></p>';
        $post->save();
    }
}
