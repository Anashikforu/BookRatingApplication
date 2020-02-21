@extends('app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <br>
        <h1 class="display-3">Books</h1> 
        <a class="btn btn-success btn-sm" href="{{ route('book.create') }}">Add a Book</a>   
        <a class="btn btn-info btn-sm" href="{{ url(' /') }}">Back</a>   
        <hr>
      <table class="table table-striped">
        <thead>
            <tr>
              <td>#</td>
              <td>Name</td>
              <td>Author</td>
              <td>Publisher</td>
              <td>Price</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->price}}</td>
                <td>
                    <a href="{{ route('book.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('book.destroy', $book->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
    </div>
    @endsection