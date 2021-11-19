<?php

use Illuminate\Database\Seeder;
use App\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagNames=["Blogging", "Homeworks", "Connections", "Trips", "Love", "Design"];

        foreach($tagNames as $tagName){
            $newTag = new Tag;
            $newTag->name = $tagName;

            $newTag->save();
        }
    }
}
