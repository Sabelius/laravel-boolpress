<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ["Attualità", "Scienza", "Tecnologia", "Politica", "Sport"];

        foreach($categoryNames as $categoryName){
           $category = new Category();
           $category->name = $categoryName;
           $category->save();

        }
    }
}
