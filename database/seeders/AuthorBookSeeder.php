<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $books = Book::all();

        foreach ($authors as $author) {
            $author->books()->attach($books->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
