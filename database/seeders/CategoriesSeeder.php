<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('subcategories')->truncate();

        $c = new Category;
        $c->name = "Biographies";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Historical";
        $s->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Travelers & Explorers";
        $s->save();

        $c = new Category;
        $c->name = "Business & Investing";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Management & Leadership";
        $s->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Economics";
        $s->save();

        $c = new Category;
        $c->name = "Sci-Fi & Fantasy";
        $c->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Fantasy";
        $s->save();

        $s = new Subcategory;
        $s->category_id = $c->id;
        $s->name = "Sci-Fi";
        $s->save();
    }
}
