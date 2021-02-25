<h1>Create reservation</h1>

@if ($errors->any())
    <div>
        <h4>Validation errors!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ action('ReservationController@store') }}">
    @csrf
    <select name="book_id" value="{{ old('book_id')}}">
        @foreach($books as $book)
            <option value="{{ $book->id }}" {{old("book_id") == $book->id ? "selected":""}}>
                {{ $book->title }}
            </option>
        @endforeach
    </select>
    From<input type="date" name="from" value="{{ old('from') }}">
    To<input type="date" name="to" value="{{ old('to') }}">
    <input type="submit" value="Create">
</form>
