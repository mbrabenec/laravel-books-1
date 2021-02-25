<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string',
            'rating' => 'required|numeric|min:0|max:100',
        ]);

        $data = $request->all();
        $data['book_id'] = $id;
        $review = Review::create($data);

//        $review = new Review();
//        $review->book_id = $id;
//        $review->text = $request->input('text');
//        $review->rating = $request->input('rating');
//        $review->save();

        return redirect( action('BookController@show', $id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id, $review_id)
    {
        $review = Review::findOrFail($review_id);

        $review->delete();

        session()->flash('success_message', 'The review was successfully deleted');

        return redirect()->action('BookController@show', $book_id);
    }
}
