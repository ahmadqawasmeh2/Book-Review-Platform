<?php

namespace App\Service\Book;

use App\Repository\Book\BookRepository;
use Illuminate\Support\Facades\Http;

class BooksService
{
    public function __construct(protected BookRepository $bookRepository) {}

    public function getAllBookUsingGoogle($query)
    {
        $key = env('GOOGLE_BOOKS_API_KEY');
        return Http::get("https://www.googleapis.com/books/v1/volumes?q={$query}&key={$key}")->json();
    }


    private function createBook($data) {}
}
