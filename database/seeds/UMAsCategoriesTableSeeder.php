<?php

use Illuminate\Database\Seeder;
use App\UmaCategory;

class UMAsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $categoriesStr = file_get_contents('database/data/umas-categories.json');
         $categoriesArr = json_decode($categoriesStr, true);

         foreach ($categoriesArr as $category) {
             UmaCategory::create([
                 'name' => $category['Category'],
                 'slug' => str_slug($category['Category']),
                 'code' => $category['Code'],
             ]);

         }
     }
}
