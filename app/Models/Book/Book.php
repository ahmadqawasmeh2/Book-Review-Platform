<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    public function review(): HasMany
    {
        return $this->hasMany(ReviewBook::class, 'book_id', 'id');
    }
}
