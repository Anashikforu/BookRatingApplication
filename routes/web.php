<?php
use App\Book;

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



// Route::get('/ratings', function () {
//     $books = Book::all();
//     return view('book',compact('books'));
// });

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/book' , 'BookController');
    Route::resource('/ratings' , 'RatingController');
});
