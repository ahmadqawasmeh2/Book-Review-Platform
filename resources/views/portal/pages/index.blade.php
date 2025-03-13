@extends('portal.layouts.app')
@section('content')
<div class="container mt-3 pb-5">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3">Books</h2>
                <div class="mt-2">
                    {{-- <a href="{{route('home.index')}}" class="text-dark">Clear</a> --}}
                </div>
            </div>
            <div class="row mt-4">
                @foreach($books as $book)
                @php 
                $averageRating = $book->review()->avg('rating') ?? 0;
                $ratingPercentage = ($averageRating / 5) * 100; 
                @endphp
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card book-card border-0 shadow-lg">
                        <a href="{{route('home.details',$book->id)}}" class="text-decoration-none text-dark">
                            <img src="{{ asset($book->cover_image) }}" alt="{{$book->title}}"
                                class="card-img-top book-image">
                            <div class="card-body">
                                <h3 class="h5 heading book-title">{{ $book->title }}</h3>
                                <p class="book-author">by {{ $book->author }}</p>
                                <div class="star-rating">
                                    <span class="rating-text theme-font theme-yellow">{{ $averageRating }}</span>
                                    <div class="star-rating d-inline-flex mx-2">
                                        <div class="back-stars">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <div class="front-stars" style="width: {{ $ratingPercentage }}%;">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="theme-font text-muted">({{ $book->review()->count() }} Reviews)</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection
