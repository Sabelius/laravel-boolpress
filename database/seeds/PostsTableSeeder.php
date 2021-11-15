<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 50; $i++){
            $newPost = new Post();
            $newPost->author = $faker->name;
            $newPost->published_at = $faker->date();
            $newPost->post_name = $faker->words(3, true);
            $newPost->post_description = $faker->words(12, true);
            $newPost->content = $faker->text(1000);
            $newPost->save();
        }
    }
}