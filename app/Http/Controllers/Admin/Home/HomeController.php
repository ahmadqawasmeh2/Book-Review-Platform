<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Repository\Book\BookRepository;
use App\Repository\Review\ReviewRepository;
use App\Repository\User\UserRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    static string $viewPath = 'admin.pages.';
    public function __construct(
        protected BookRepository $bookRepository,
        protected ReviewRepository $reviewRepository,
        protected UserRepository $userRepository
    ) {}


    public function getPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $countUser = $this->userRepository->countroleUser();
        $countBook = $this->bookRepository->count();
        $countReview = $this->reviewRepository->count();
        return view(self::$viewPath . 'index', compact('countUser', 'countBook', 'countReview'));
    }
}
