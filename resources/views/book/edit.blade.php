@extends('app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
     <br>
    <h1 class="display-3">Add a Book</h1>
    <a class="btn btn-info btn-sm" href="{{ route('book.index') }}">Back</a>   
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('book.update' , $books) }}">
        @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="name">Book Name:</label>
          <input type="text" class="form-control" name="name" value="{{$books->name}}"/>
          </div>


          <div class="form-group">
              <label for="author">Author:</label>
              <input type="text" class="form-control" name="author" value="{{$books->author}}"/>
          </div>
          <div class="form-group">
              <label for="publisher">Publisher:</label>
              <input type="text" class="form-control" name="publisher" value="{{$books->publisher}}"/>
          </div>
          <div class="form-group">
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price" value="{{$books->price}}"/>
          </div>                      
          <button type="submit" class="btn btn-success">Add</button>
      </form>
  </div>
</div>
</div>
@endsection