<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;

class BookCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = Subcategory::all();

        $books = Book::all();

        $max_index = $subcategories->count() - 1;

        foreach ($books as $book) {
            $subcategory = $subcategories[rand(0, $max_index)];
            $book->category_id = $subcategory->category_id;
            $book->subcategory_id = $subcategory->id;
            $book->save();
        }
    }
}
