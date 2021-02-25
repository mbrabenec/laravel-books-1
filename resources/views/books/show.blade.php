@extends('layouts.main')

@section('content')

<h1>{{ $book->title }}</h1>
<h2>{{ $book->authors }}</h2>

<img src="{{ $book->image }}" alt="{{ $book->title }} - cover">

@if (Auth::user())

    <h2>Order this book</h2>
    <form action="{{ action('OrderController@order', $book->id) }}" method="post">
        @csrf

        <input type="number" name="quantity" value="{{ old('quantity') }}">

        <input type="submit" value="Order!">

    </form>

@endif


<a href="{{ action('BookController@index') }}">
    Back to list of books
</a>

<hr>

<h2>Reviews</h2>

@auth

    <form
        method="post"
        action="{{ action('ReviewController@store', $book->id) }}"
    >
        @csrf
        <textarea name="text"></textarea>
        <input type="number" name="rating"/>
        <input type="submit" value="create a review">
    </form>

@endauth

@guest

    <p>
        Please <a href="{{ route('login') }}">log in</a> to submit a review.
    </p>

@endguest

@foreach( $book->reviews as $review)
    <div>
        <p>{{ $review->text }}</p>
        <strong>{{ $review->rating }} / 100</strong>

        @can('admin')

            <form action="{{ action('ReviewController@destroy', [$book->id, $review->id]) }}" method="post">
                @csrf
                @method('delete')

                <input
                    type="submit"
                    value="Delete this review"
                    onclick="if (!confirm('Do you really want to delete this review?')) return false;"
                >
            </form>

        @endcan
    </div>
@endforeach

@endsection