<?php

namespace App\Service\Book;

use App\Models\Book\ReviewBook;
use App\Repository\Book\BookRepository;
use App\Repository\Review\ReviewRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BooksService
{
    public function __construct(protected BookRepository $bookRepository, protected ReviewRepository $reviewRepository) {}

    public function getAllBookUsingGoogle($query)
    {
        try {
            $key = env('GOOGLE_BOOKS_API_KEY') ?? 'Please Write Key Google ';
            $response = Http::get("https://www.googleapis.com/books/v1/volumes", [
                'q' => $query,
                'key' => $key
            ])->json();

            if (!isset($response['items'])) {
                return false;
            }
            $books = [];
            foreach ($response['items'] as $item) {
                $volumeInfo = $item['volumeInfo'] ?? [];
                $books[] = [
                    'uuid'        => $item['id'] ?? null,
                    'title'       => $volumeInfo['title'] ?? 'No Title',
                    'author'      => $volumeInfo['authors'][0] ?? 'Unknown Author',
                    'isbn'        => $volumeInfo['industryIdentifiers'][0]['identifier'] ?? 'No ISBN',
                    'cover_image' => $volumeInfo['imageLinks']['thumbnail'] ?? null,
                    'description' => $volumeInfo['description'] ?? 'No Description',
                    'link'        => $volumeInfo['previewLink'] ?? null,
                ];
            }
            if (!empty($books)) {
                foreach ($books as $book) {
                    $this->bookRepository->createOrUpdate($book);
                }
            }

            return true;
        } catch (\Exception $e) {
            Log::error("Google Books API Error: " . $e->getMessage());
            return false;
        }
    }


    public function datatable()
    {
        $data = $this->bookRepository->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($data) {
                return $data->title;
            })
            ->addColumn('author', function ($data) {
                return $data->author;
            })
            ->addColumn('isbn', function ($data) {
                return $data->isbn;
            })
            ->addColumn('cover_image', function ($data) {
                $imageUrl = asset($data->cover_image);
                return '<img src="' . $imageUrl . '" alt="Cover Image" width="50" height="50">';
            })
            ->addColumn('description', function ($data) {
                return '<span class="description-cell">' . htmlentities($data->description) . '</span>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? $data->created_at->diffForHumans() : null;
            })
            ->addColumn('actions', function ($data) {
                $actions = [];
                $actions[] = [
                    "name" => 'Show',
                    'class' => "btn btn-primary btn-action",
                    "route" => route('admin.book.show', $data->id),
                    "icon" => "fas fa-eye",
                ];

                return view("admin.datatable.actions", compact('actions', 'data'));
            })
            ->rawColumns(['cover_image', 'actions', 'description']) // Allow rendering raw HTML
            ->make(true);
    }

    public function store(array $data)
    {
        $data['cover_image'] = upImage($data['cover_image'], 'CoverImageBook');
        $this->bookRepository->create($data);
        return redirect()->route('admin.book.index')->with('success', 'Success Created Book');
    }



    public function reviewSubmit(array $data)
    {
        $data['user_id'] = auth()->id();
        $this->reviewRepository->create($data);
        return redirect()->route('home.index');
    }
}
