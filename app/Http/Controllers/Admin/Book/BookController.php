<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBookAdminRequest;
use App\Repository\Book\BookRepository;
use App\Repository\Review\ReviewRepository;
use App\Service\Book\BooksService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    static string $viewPath = 'admin.pages.book';
    static string $routePath = 'admin.book.';

    public function __construct(
        private BooksService $books_service,
        private BookRepository $book_repository,
        private ReviewRepository $reviewRepository
    ) {}

    public function getPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // $books = $this->books_service->getAllBookUsingGoogle('flowers');

        return view(self::$viewPath . '.index');
    }

    public function dataTable()
    {
        return $this->books_service->dataTable();
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view(self::$viewPath . '.create');
    }

    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $model = $this->book_repository->getById($id);
        $count = $this->reviewRepository->CountById($id);
        $avg = $this->reviewRepository->avg($id);
        $getAll = $this->reviewRepository->getAllById($id);

        return view(self::$viewPath . '.show', compact('model', 'count', 'avg', 'getAll'));
    }
    public function store(AddBookAdminRequest $request)
    {
        return $this->books_service->store($request->all());
    }
}
