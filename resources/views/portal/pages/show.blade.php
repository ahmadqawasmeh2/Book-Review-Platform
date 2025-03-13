@extends('portal.layouts.app')
@section('content')

@php 
$averageRating = $book->review()->avg('rating') ?? 0;
$ratingPercentage = ($averageRating / 5) * 100; 
@endphp

<div class="container mt-3 ">
    <div class="row justify-content-center d-flex mt-5">
        @if(Session::has('success'))

        <p class="alert alert-success">
            {{ Session::get('success') }}
        </p>
        @endif
        <div class="col-md-12">
            <a href="{{route('home.index')}}" class="text-decoration-none text-dark ">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; <strong>Back to books</strong>
            </a>

            <div class="row mt-4">
                <div class="col-md-4">
                    <a href="{{route('home.details',$book->id)}}"><img src="{{asset($book->cover_image)}}"
                            alt="{{$book->title}}" class="card-img-top"></a>
                </div>
                <div class="col-md-8">
                    <h3 class="h2 mb-3">{{$book->title}}</h3>
                    <div class="h4 text-muted"> by-{{$book->author}}</div>
                    <div class="star-rating d-inline-flex ml-2" title="{{$book->title}}">
                        <span class="rating-text theme-font theme-yellow">{{ $averageRating }}</span>
                        <div class="star-rating d-inline-flex mx-2" title="{{$book->title}}">
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
                        <span class="theme-font text-muted">({{$book->review()->count()}} Review)</span>
                    </div>

                    <div class="content mt-3">
                        <p>"{{strip_tags($book->description)}}"</p>


                    </div>

                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>

                    <div class="row mt-4">
                
                        <div class="row pb-5">
                            <div class="col-md-12  mt-4">
                                @if(Auth::check())
                                <div class="d-flex justify-content-between">
                                    <h3>Reviews</h3>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Add Review
                                        </button>

                                    </div>
                                </div>
                                @endif

                                @if(!empty($book->review))
                                @foreach($book->review as $bookReview)
                                <div class="card border-0 shadow-lg my-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-3">{{ $bookReview->user->name}}</h4>
                                                <span class="text-muted">{{$bookReview->created_at}}</span>
                                        </div>
                                        <div class="mb-3">
                                            <div class="star-rating d-inline-flex mx-2" title="{{$book->title}}">
                                                <div class="back-stars">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                            
                                                    <div class="front-stars" style="width: {{ $bookReview->rating/5 *100 }}%;">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="content">
                                            <p>{{$bookReview->review}}.</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div>
                                    Reviews Not Found
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Review for
                        <strong>{{$book->title}}</strong>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('home.reviewSubmit')}}" method="post" id="ReviewForm" name="ReviewForm">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea name="review" id="review" class="form-control" cols="5" rows="5" required
                                placeholder="Review">

                            </textarea>
                        </div>
                        <input type="hidden" name="book_id" value="{{$book->id}}">
                        @error('review')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" required id="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        @error('rating')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
    @section('cstomjs')
    <script>
        $("#ReviewForm").submit(function(e) {
            e.preventDefault();

        });
    </script>
    @endsection