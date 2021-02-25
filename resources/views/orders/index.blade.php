@extends('layouts.main')

@section('content')

<h1>Orders</h1>

<ul>
    @foreach ($orders as $order)

        <li>
            <a href="{{ action('OrderController@show', $order->id) }}">Order #{{ $order->id }}</a>
        </li>

    @endforeach
</ul>

@endsection