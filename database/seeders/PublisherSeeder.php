<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;
use DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->truncate();

        $publishers = [
            'Thomson Reuters',
            'Pearson',
            'Bertelsmann',
            'Hachette Livre',
            'Wiley',
            'HarperCollins'
        ];

        foreach ($publishers as $publisher) {
            $new_publisher = new Publisher;
            $new_publisher->title = $publisher;
            $new_publisher->save();
        }
    }
}
