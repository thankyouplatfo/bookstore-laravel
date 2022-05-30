<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::factory(10)->create();
        //
        //$books = Book::all();
        ////
        //foreach ($books as $book) {
        //    # code...
        //    $book->authors()->attach(Arr::random([1, 2, 3, 4, 5, 6], 2));
        //}
    }
}
