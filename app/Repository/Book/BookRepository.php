<?php

namespace App\Repository\Book;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Builder;

class BookRepository
{
    private Builder $model;
    public function __construct()
    {
        $this->model = Book::query();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function all()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}
