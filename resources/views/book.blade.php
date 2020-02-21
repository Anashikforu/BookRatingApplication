@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <br>
        <h1 class="display-3">Books</h1> 
        <hr>
      {{-- <table class="table table-striped"> --}}
        {{-- <tbody> --}}
            @foreach($books as $book)
            <div class="card mb-12">
                <div class="row no-gutters">
                  <div class="col-md-1">
                      <h3>{{$book->id}}</h3>
                    <img src="..." class="card-img" alt="....." >
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$book->name}}</b></h5>
                      <input type="hidden" class="form-control" name="book_id" value="{{$book->id}}"/>
                      <p class="card-text">by <b>{{$book->author}}</b></p>
                      <p class="card-text">Publisher - {{$book->publisher}} ;   Price : {{$book->price}} Tk</p>
                      <p class="card-text"><small class="text-muted">
                        @if (is_int($rate->where('book_id',$book->id)->avg('rating')))
                            @for ($i = 1; $i <= $rate->where('book_id',$book->id)->avg('rating') ; $i++)
                                <span class="fa fa-star customChecked"></span>
                            @endfor
                        @elseif (is_double($rate->where('book_id',$book->id)->avg('rating')))
                            @for ($i = 1; $i <= $rate->where('book_id',$book->id)->avg('rating') ; $i++)
                                <span class="fa fa-star customChecked"></span>
                            @endfor
                            <span class="fa fa-star-half customChecked"></span>
                        @else
                            @for ($i = 1; $i <= 5 ; $i++)
                                <span class="fa fa-star "></span>
                            @endfor
                        @endif
                        @if (($rate->where('book_id',$book->id)->avg('rating')) != NULL)
                            <a >{{$rate->where('book_id',$book->id)->avg('rating')}} avg rating</a>
                        @endif
                        <a > — {{$rate->where('book_id',$book->id)->sum('rating')}} ratings</a>
                        </small></p>
                        <p class="card-text"><small  style="color:blue !important">{{$rate->where('book_id',$book->id)->count('id')}} people voted</small></p>
                    </div>
                  </div>
                  <div class="col-md-2">
                      <div class="card-body">
                        <div class="row">
                            <a href="#" class="btn btn-success btn-lg">Want to Read ? </a>
                        </div>
                        <div class="row">
                            @if ( DB::table('ratings')->where('book_id', $book->id)->where('user_id', Auth::User()->id)->first()  )
                            @if ( is_int($ratings->where('book_id', $book->id)->first()->rating))
                            <a>Your Rating:</a>
                            <div>
                                @for ($i = 1; $i <= $ratings->where('book_id', $book->id)->first()->rating ; $i++)
                                    <span class="fa fa-star customChecked"></span>
                                @endfor
                            </div>
                            @else
                            <a>Your Rating:</a>
                            <div>
                                @for ($i = 1; $i <= $ratings->where('book_id', $book->id)->first()->rating ; $i++)
                                    <span class="fa fa-star customChecked"></span>
                                @endfor
                                @if (is_double($ratings->where('book_id', $book->id)->first()->rating))
                                    <span class="fa fa-star-half customChecked"></span>
                                @endif
                            </div>
                            @endif 
                            @else
                            <br>
                                <a class="text-muted" href="{{ route('book.show', $book->id ) }}">Rate this book!</a>
                            @endif
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            {{-- <tr>
                    {{-- <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    
                    <td>{{$book->author}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        @if (is_int($rate->where('book_id',$book->id)->avg('rating')))
                            @for ($i = 1; $i <= $rate->where('book_id',$book->id)->avg('rating') ; $i++)
                                <span class="fa fa-star customChecked"></span>
                            @endfor
                        @elseif (is_double($rate->where('book_id',$book->id)->avg('rating')))
                            @for ($i = 1; $i <= $rate->where('book_id',$book->id)->avg('rating') ; $i++)
                                <span class="fa fa-star customChecked"></span>
                            @endfor
                            <span class="fa fa-star-half customChecked"></span>
                        @else
                            @for ($i = 1; $i <= 5 ; $i++)
                                <span class="fa fa-star "></span>
                            @endfor
                        @endif
                        @if (($rate->where('book_id',$book->id)->avg('rating')) != NULL)
                            <a >{{$rate->where('book_id',$book->id)->avg('rating')}} avg rating</a>
                        @endif
                        
                    </td> --}}
                    {{-- <td>
                        @if ( DB::table('ratings')->where('book_id', $book->id)->where('user_id', Auth::User()->id)->first()  )
                            @if ( is_int($ratings->where('book_id', $book->id)->first()->rating))
                                @for ($i = 1; $i <= $ratings->where('book_id', $book->id)->first()->rating ; $i++)
                                    <span class="fa fa-star customChecked"></span>
                                @endfor
                            @else
                                @for ($i = 1; $i <= $ratings->where('book_id', $book->id)->first()->rating ; $i++)
                                    <span class="fa fa-star customChecked"></span>
                                @endfor
                                @if (is_double($ratings->where('book_id', $book->id)->first()->rating))
                                    <span class="fa fa-star-half customChecked"></span>
                                @endif
                                
                            @endif 
                        @else
                            <a class="btn btn-success btn-sm" href="{{ route('book.show', $book->id ) }}">Rate It</a>
                        @endif
                    </td>
            </tr> --}} 
            @endforeach
        {{-- </tbody> --}}
      {{-- </table> --}}
    <div>
    </div>
    @endsection
@push('css')
<style>
    
    .customChecked {
        color: orange;
    }
    </style>
@endPush    

