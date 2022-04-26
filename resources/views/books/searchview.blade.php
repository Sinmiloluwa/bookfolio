@extends('layouts.user')

@section('content')
<section class="our-services" id="services">
        <div class="container">
            
            <div class="row">
                @foreach($books as $book)
                <div class="col-md-3">
                    <div class="service-item">
                        <div class="icon">
                            <img src="{{url('uploads/images/',$book->book_cover)}}" alt="" style="width: 100px; height:100px; border-radius:50px;">
                        </div>
                        <h4>{{$book->name}}</h4>
                        <p>{{ Str::limit($book->description, 100)}}</p>
                        <span>By: {{$book->author}}</span><br><br>
                        <span><a name="" id="" class="btn btn-primary" href="{{route('books.view',$book->id)}}" role="button">View</a></span>
                    </div>
                </div>
                @endforeach
               
            </div>
            
        </div>
    </section>

@endsection