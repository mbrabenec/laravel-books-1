<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');

//        $this->middleware('auth')->only(['create', 'store']);
    }

    public function index()
    {
//        $user = Auth::user();
//        return $user;

        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $books = Book::all();

        return view('reservations.create', compact('books'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|exists:books,id',
            'from'    => 'required|date',
            'to'      => 'required|date',
        ]);


        $from = $request->input('from');
        $to   = $request->input('to');
        $book_id = $request->input('book_id');

        $reservations = Reservation::where('book_id', $book_id)->get();
        foreach($reservations as $res) {
            if($res->book_id == $book_id) {
                if((($res->to >= $from) && ($res->to <=$to)) || (($res->from >= $from) && ($res->from <=$to))) {
                    return Redirect::back()->withInput()->withErrors(['from' => 'Overlapping reservation']);
                }
            }
        }

        $data              = $request->all();
        $data[ 'user_id' ] = Auth::id();

        Reservation::create($data);

        return redirect(action('ReservationController@index'));
    }
}
