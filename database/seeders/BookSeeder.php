<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();

        $b = new Book;
        $b->title = 'The Hunger Games';
        $b->authors = 'Suzanne Collins';
        $b->image = 'https://images.gr-assets.com/books/1447303603m/2767052.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'Harry Potter and the Philosopher\'s Stone';
        $b->authors = 'J.K. Rowling, Mary GrandPré';
        $b->image = 'https://images.gr-assets.com/books/1474154022m/3.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'Twilight';
        $b->authors = 'Stephenie Meyer';
        $b->image = 'https://images.gr-assets.com/books/1361039443m/41865.jpg';
        $b->save();

        $b = new Book;
        $b->title = 'To Kill a Mockingbird';
        $b->authors = 'Harper Lee';
        $b->image = 'https://images.gr-assets.com/books/1361975680m/2657.jpg';
        $b->save();

        $b = new Book;
        $b->title = "Shade: A Tale of Two Presidents";
        $b->authors = "Pete Souza";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41IgIfhXb0L._AC_US436_FMwebp_QL65_.jpg";
        $b->save();

        $b = new Book;
        $b->title = "Into the Wild";
        $b->authors = "Jon Krakauer";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/51rJVzn7lsL._AC_US436_FMwebp_QL65_.jpg";
        $b->save();

        $b = new Book;
        $b->title = "Leadership Strategy and Tactics: Field Manual";
        $b->authors = "Jocko Willink";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41f1H2rgSoL._AC_US436_FMwebp_QL65_.jpg";
        $b->save();

        $b = new Book;
        $b->title = "Dune (Dune Chronicles, Book 1)";
        $b->authors = "Frank Herbert";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41UZeCEKOBL._AC_US436_FMwebp_QL65_.jpg";
        $b->save();

        $b = new Book;
        $b->title = "1984";
        $b->authors = "George Orwell, Erich Fromm";
        $b->image = "https://images-na.ssl-images-amazon.com/images/I/41aM4xOZxaL._AC_US436_FMwebp_QL65_.jpg";
        $b->save();
    }
}
