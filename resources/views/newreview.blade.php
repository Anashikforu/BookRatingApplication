@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
     <br>
    <h1 class="display-3">Rate</h1>
    <a class="btn btn-info btn-sm" href="{{ route('ratings.index') }}">Back</a>   
    <br>
    <hr>
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
      <form  method="post" action="{{ route('ratings.store',$books) }}">
        @csrf
        <div class="card mb-12">
            <div class="row no-gutters">
              <div class="col-md-1">
                  <h3>{{$books->id}}</h3>
                <img src="..." class="card-img" alt="....." >
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><b>{{$books->name}}</b></h5>
                    <input type="hidden" class="form-control" name="book_id" value="{{$books->id}}"/>
                  <p class="card-text">by <b>{{$books->author}}</b></p>
                  <p class="card-text">Publisher - {{$books->publisher}} ;   Price : {{$books->price}} Tk</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card-body">
                    
                    <div class="rate">
                        @for ($i = 5; $i > 0; $i--)
                        <input type="submit" id="star{{$i}}" name="rating" value="{{$i}}"  />
                        <label for="star{{$i}}" title="{{$i}}">{{$i}} stars</label>
                        @endfor
                    </div>
                    
                  </div>
              </div>
            </div>
        </div>
        {{-- <td>{{$books->id}}</td>
        <td>{{$books->name}}</td>
        <input type="hidden" class="form-control" name="book_id" value="{{$books->id}}"/>
        
        <td>{{$books->author}}</td>
        <td>{{$books->publisher}}</td>
        <td>{{$books->price}}</td>
        <td>
            <div class="rate">
                @for ($i = 5; $i > 0; $i--)
                <input type="submit" id="star{{$i}}" name="rating" value="{{$i}}"  />
                <label for="star{{$i}}" title="{{$i}}">{{$i}} stars</label>
                @endfor
            </div>
        </td> --}}
    </form>
  </div>
</div>
</div>
@endsection
@push('css')
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    </style>
@endPush 