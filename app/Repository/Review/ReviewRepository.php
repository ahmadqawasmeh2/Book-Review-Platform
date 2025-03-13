<?php

namespace App\Repository\Review;

use App\Models\Book\ReviewBook;
use Illuminate\Database\Eloquent\Builder;

class ReviewRepository
{
    private Builder $model;
    public function __construct()
    {
        $this->model = ReviewBook::query();
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
    public function count()
    {
        return $this->model->count();
    }

    public function avg($id)
    {
        return $this->model->where('book_id', $id)->avg('rating');
    }

    public function CountById($id)
    {
        return $this->model->where('book_id', $id)->count();
    }

    public function getAllById($id)
    {
        return $this->model->with('user')->where('book_id', $id)->get();
    }
}
