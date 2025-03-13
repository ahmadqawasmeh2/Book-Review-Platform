<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{

    public $fillable = ['title', 'uuid', 'link', 'author', 'isbn', 'cover_image', 'description'];
    public $with = ['review'];
    public function review(): HasMany
    {
        return $this->hasMany(ReviewBook::class, 'book_id', 'id');
    }
}
