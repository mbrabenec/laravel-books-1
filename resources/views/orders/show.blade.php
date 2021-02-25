@extends('layouts.main')

@section('content')

<h1>Order #{{ $order->id }}</h1>

<h2>Books in order:</h2>
<ul>
    @foreach ($order->books as $book)
        <li>
            {{ $book->title }}
            {{ $book->pivot->quantity }}
        </li>
    @endforeach
</ul>

@endsection