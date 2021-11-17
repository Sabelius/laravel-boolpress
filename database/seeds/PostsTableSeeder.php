<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use App\Category;
use App\Post;
use App\User;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();
        $users = User::pluck("id")->toArray();

        for($i=0; $i < 50; $i++){
            $newPost = new Post();
            $newPost->user_id = Arr::random($users);
            $newPost->published_at = $faker->date();
            $newPost->post_name = $faker->words(3, true);
            $newPost->post_description = $faker->words(12, true);
            $newPost->content = $faker->text(1000);

            $newPost->category_id = Arr::random($category_ids);

            $newPost->save();
        }
    }
}