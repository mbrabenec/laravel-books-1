<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use App\Models\Book;
use App\Models\Publisher;

class OldBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers_in_database = Publisher::get()->pluck('title', 'id')->toArray();

        $old_publishers = DB::table('old_publishers')->get();
        foreach ($old_publishers as $old_publisher) {

            // if this publisher's name already exists in the database
            if (in_array($old_publisher->name, $publishers_in_database)) {
                continue;
            }

            $publisher = new Publisher;
            $publisher->title = $old_publisher->name;
            $publisher->save();

            $publishers_in_database[ $publisher->id ] = $publisher->title;
        }


        $old_books = DB::table('old_books')
            ->select('old_books.*', 'old_publishers.name AS publisher_name')
            ->leftJoin('old_publishers', 'old_books.publisher_id', 'old_publishers.id')
            ->get();


        foreach ($old_books as $old_book) {

            // find an element of an array using the value
            $publisher_id = array_search($old_book->publisher_name, $publishers_in_database);

            // create a book
            $book = new Book;
            $book->publisher_id = $publisher_id;
            $book->title = $old_book->title;
            $book->authors = $old_book->authors ?? '';
            $book->image = $old_book->image;
            $book->save();
        }
    }
}
