@extends('layouts.user')

@section('content')
<div class="container mt-10">
    <div class="row">
        <div class="col-md-12">
        <div class="book-details mt-100 pb-90">
            <div class="container">
           <div class="row">
               <div class="col-md-6">
                    <div class="">
                        <input type="text" placeholder="Search for a book....">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Search</a>
                    </div>
                    <div class="category_menu">
                        <h3>Categories</h3>
                        <ul>
                            <a href=""><li>Adventure</li></a>
                        </ul>
                    </div>
               </div>
               
               <div class="col-md-6">
                    <div class="product_img">
                        <img src="/images/2004003.jpg" alt="" style="width: 500px; height:350px; ">
                    </div><br>
                    <div class="product_title">
                        <h1>{{$book->name}}</h1>
                    </div><br>
                    <div class="product_desc">
                        Description: 
                    </div><br>
                    <span>Price</span><br><br>
                    <span>Pricing</span><br><br> 
                    <span>Categories:@foreach($book->categories as $category)    
                            {{$category->name}},
                    @endforeach
                    </span> 
               </div>
           </div>
            </div>
           </div>
        </div>
    </div>
</div>

@endsection