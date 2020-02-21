<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rating;
use Illuminate\Http\Request;
use DB;
use auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())
        {
            $books = Book::all();
            return view('book.index',compact('books'));
        }
        else
            { return redirect()->back()->with('danger', 'Permission Denied!');  }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())
        {
            return view('book.create');
        }
        else
            { return redirect()->back()->with('danger', 'Permission Denied!');  }
        
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
        if(!(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())){ return redirect()->back()->with('danger', 'Permission Denied!');  }
        
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'price'=>'required',
        ]);

        $books = new Book([
            'name' => $request->get('name'),
            'author' => $request->get('author'),
            'publisher' => $request->get('publisher'),
            'price' => $request->get('price')
        ]);
        $books->save();
        return redirect('/book')->with('success', 'Book saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show( $book)
    {
        //
        $books = Book::find($book);
        
        return view('newreview',compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit( $book)
    {
        //
        if(!(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())){ return redirect()->back()->with('danger', 'Permission Denied!');  }
        $books = Book::find($book);
        return view('book.edit',compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $book)
    {
        //
        if(!(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())){ return redirect()->back()->with('danger', 'Permission Denied!');  }
        
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'price'=>'required',
        ]);

        $books = Book::find($book);
        $books->name  = $request->get('name');
        $books->author = $request->get('author');
        $books->publisher = $request->get('publisher');
        $books->price = $request->get('price');
        $books->save();
        return redirect('/book')->with('success', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy( $book)
    {
        //
        if(!(DB::table('users')->where('id',Auth::User()->id)->where('type','admin')->first())){ return redirect()->back()->with('danger', 'Permission Denied!');  }
        
        $books = Book::find($book);
        $books->delete();

        return redirect('/book')->with('success', 'Book deleted!');
    }
}
