<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Publisher;

class BookPublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher_ids = Publisher::all()->pluck('id')->toArray();

        $books = Book::all();

        $max_index = count($publisher_ids) - 1;

        foreach ($books as $book) {
            $book->publisher_id = $publisher_ids[rand(0, $max_index)];
            $book->save();
        }
    }
}
