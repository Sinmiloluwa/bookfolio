@extends('layouts.user')

@section('content')
<section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Our Books</span>
                        <h2>Best Online Library</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                @foreach($books as $book)
                <div class="col-md-3">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/img/service_icon_1.png" alt="">
                        </div>
                        <h4>{{$book->name}}</h4>
                        <p>{{$book->description}}</p>
                        <span>By: {{$book->author}}</span><br><br>
                        <span><a name="" id="" class="btn btn-primary" href="{{route('books.view',$book->id)}}" role="button">View</a></span>
                    </div>
                </div>
                @endforeach
               
            </div>
            
        </div>
    </section>

@endsection