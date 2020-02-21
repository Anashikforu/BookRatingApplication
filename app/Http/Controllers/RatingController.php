<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = DB::table('books')->get();
        $ratings = Rating::where('user_id',Auth::User()->id)->get();
        $rate = Rating::all();
        // dd($ratings);
        return view('book',compact('books','ratings','rate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        //
        // $books = DB::table('books')->where('id',$id)->get();
        // return view('newreview');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $ratings = new Rating;
        $ratings->user_id = Auth::User()->id;
        $ratings->book_id = $request->get('book_id');
        $ratings->rating = $request->get('rating');
    
        $ratings->save();
        return redirect('/ratings')->with('success', 'Submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($rating)
    {
        //
        $books = DB::table('books')->where('id',$rating)->get();
        return view('newreview',compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rating)
    {
        //
        $ratings = Rating::find($rating);
        $ratings->rating = $request->get('rating');
    
        $ratings->save();
        return redirect('/ratings')->with('success', 'Submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
