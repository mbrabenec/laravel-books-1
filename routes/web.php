<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/api/books', 'APIBookController@index');

Route::get('/books', 'BookController@index');
Route::get('/books/{id}', 'BookController@show');

Route::post('books/{id}/review', 'ReviewController@store');

// Route::get('books/{book_id}/reviews/{review_id}', 'ReviewController@destroy');


// administration
Route::group(['middleware' => [
    'can:admin'
]], function() {

    // all admin routes belong inside here:
    Route::delete('/reviews/delete/{book_id}/{review_id}', 'ReviewController@destroy');
});


// orders
Route::post('/order/{book_id}', 'OrderController@order');
Route::get('/orders', 'OrderController@index');
Route::get('/orders/{order_id}', 'OrderController@show');


Route::get('/publishers', 'PublisherController@index');

Route::get('/publishers/create', 'PublisherController@create');
Route::post('/publishers/store', 'PublisherController@store');

Route::get('/publishers/{id}', 'PublisherController@show');
Route::get('/publishers/{id}/edit', 'PublisherController@edit');
Route::put('/publishers/{id}', 'PublisherController@update');


Route::get('/eshop', 'EshopController@index');
Route::get('/eshop/categories/{id}', 'EshopController@category');
Route::get('/eshop/subcategories/{id}', 'EshopController@subcategory');

// bookshops
Route::get('/bookshops/create', 'BookshopController@create');
Route::post('/bookshops', 'BookshopController@store');
Route::get('/bookshops', 'BookshopController@index');

// categories
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');

Route::patch('/test', function() {
    return 'Pretending a PATCH request';
});

Route::get('reservations', 'ReservationController@index');
Route::get('reservations/create', 'ReservationController@create');
//    ->middleware('auth');
Route::post('reservations', 'ReservationController@store');
//    ->middleware('auth');
