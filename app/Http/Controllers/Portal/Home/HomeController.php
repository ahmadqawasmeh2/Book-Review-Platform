<?php

namespace App\Http\Controllers\Portal\Home;

use App\Http\Controllers\Controller;
use App\Repository\Book\BookRepository;
use App\Repository\Review\ReviewRepository;
use App\Service\Book\BooksService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    static string $viewPath = 'portal.pages.';

    public function __construct(
        protected BookRepository $bookRepository,
        protected ReviewRepository $reviewRepository,
        protected BooksService $books_service,
    ) {}

    public function getPage()
    {
        $this->books_service->getAllBookUsingGoogle('flowers');
        $books = $this->bookRepository->get();
        return view(self::$viewPath . 'index', compact('books'));
    }
    public function details($id)
    {
        $book = $this->bookRepository->getById($id);
        $review = $this->reviewRepository->avg($id);
        return view(self::$viewPath . 'show', compact('book'));
    }
    public function reviewSubmit(Request $request)
    {
        return  $this->books_service->reviewSubmit($request->all());
    }
}
