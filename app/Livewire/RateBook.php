<?php

namespace App\Livewire;

use App\Models\Book\ReviewBook;
use Livewire\Component;

class RateBook extends Component
{
    public $rating, $review, $bookId, $userId;
    public function rateBook()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'bookId' => 'required|exists:books,id',
            'userId' => 'required|exists:users,id',
            'review' => 'string|max:250'
        ]);

        ReviewBook::create([
            'book_id' => $this->bookId,
            'user_id' => $this->userId,
            'review' => $this->review,
            'rating' => $this->rating,
        ]);
    }
    public function render()
    {
        return view('livewire.rate-book');
    }
}
