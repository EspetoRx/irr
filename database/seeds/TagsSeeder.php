<?php

use Illuminate\Database\Seeder;
use App\TagsBlog;
class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag = new TagsBlog;
        $tag->name = 'Tag 1';
        $tag->save();
        $tag = new TagsBlog;
        $tag->name = 'Tag 2';
        $tag->save();
        $tag = new TagsBlog;
        $tag->name = 'Tag 3';
        $tag->save();
    }
}
