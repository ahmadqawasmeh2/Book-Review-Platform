<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    private Builder $model;
    public function __construct()
    {
        $this->model = User::query();
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
    public function countroleUser()
    {
        return $this->model->where('role', 'user')->count();
    }
}
