@extends('layouts.user')

@section('content')
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Journey to self Discovery</h2>
                        <span>Knowledge is Power</span>
                        <div class="blue-button">
                            <a class="" href="{{route('books.discover')}}">Discover Books</a>
                        </div>
                    </div>
                    <div class="submit-form">
                        <form id="form-submit" action="{{route('book.search')}}" method="get">
                            <div class="row">
                                <div class="col-md-9 first-item">
                                    <fieldset>
                                        <input name="bookname" type="text" class="form-control" id="name" placeholder="Name of Book..." required="">
                                    </fieldset>
                                </div>
        
                                <div class="col-md-3">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn">Search Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-places" id="popular">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2 style="color:black; font-weight:bolds">Popular Books</h2>
                    </div>
                </div> 
            </div> 
            <div class="owl-carousel owl-theme">
                @foreach($books as $book)
                <div class="item popular-item">
                    <div class="thumb">
                        <img src="{{url('uploads/images/',$book->book_cover)}}" width="50px" height="250px" alt="">
                        <div class="text-content">
                            <h4>{{$book->name}}</h4>
                            <span>{{$book->author}}</span>
                        </div>
                        <div class="plus-button">
                            <a href="#"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="featured-places" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Featured Books</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                @foreach($featuredBooks as $featuredBook)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <img src="img/featured_item_1.jpg" alt="">
                            <div class="overlay-content">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                           <button class="btn badde">
                                    <span class="badge bg-danger">Featured</span>
                           </button>
                        </div>
                        <div class="down-content">
                            <h4>{{$featuredBook->name}}</h4>
                            @foreach($featuredBook->categories as $category)
                            <span>{{$category->name}}</span>
                            @endforeach
                            <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
                            <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="#">Add to favorites</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="our-services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Services</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item bg-secondary">
                        <div class="icon">
                            <img src="img/service_icon_1.png" alt="">
                        </div>
                        <h4 style="color: black;">Large Search Indexing</h4>
                        <p style="color: black;">Etiam viverra nibh at lorem hendrerit porta non nec ligula. Donec hendrerit porttitor pretium. Suspendisse fermentum nec risus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item bg-secondary">
                        <div class="icon">
                            <img src="img/service_icon_2.png" alt="">
                        </div>
                        <h4 style="color: black;">Variety of Books</h4>
                        <p style="color: black;"> Vivamus nec vehicula felis, sit amet convallis ex. Aenean dolor risus, rutrum at tincidunt eget, placerat ac mauris.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item bg-secondary">
                        <div class="icon">
                            <img src="img/service_icon_3.png" alt="">
                        </div>
                        <h4 style="color: black;">Fast Customer Service</h4>
                        <p style="color: black;">Praesent nec dui sed urna pharetra dapibus at ac elit. Aenean hendrerit metus leo, quis viverra purus condimentum nec.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="down-services">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="left-content">
                                    <h4>Testimonials</h4>
                                    <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst.</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="accordions">
                                    <ul class="accordion">
                                        <li>
                                            <a>Ut in dapibus ipsum</a>
                                            <p>Nulla eget aliquet dui, vitae tincidunt nulla. Sed sagittis odio vitae auctor volutpat. In semper ex neque, ut hendrerit mauris rutrum eget. Integer consectetur neque eu enim dictum porta. Sed et risus ac sapien congue mattis.</p>
                                        </li>
                                        <li>
                                            <a>Vivamus ligula metus</a>
                                            <p>Integer vel augue arcu. Fusce ac turpis cursus, malesuada nulla quis, lobortis dui. Etiam blandit, erat efficitur rhoncus pellentesque, ligula turpis tempor dolor.</p>
                                        </li>
                                        <li>
                                            <a>Suspendisse dapibus</a>
                                            <p>Nullam nibh lacus, rhoncus sit amet feugiat vel, porttitor sit amet nibh. Pellentesque feugiat justo nec enim pretium, sed faucibus lacus aliquam. Sed ac interdum mauris.</p>
                                        </li>
                                    </ul> <!-- / accordion -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <h2>Journey to self discovery</h2>
                <a href="http://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="assets/highway-loop.mp4" type="video/mp4" />
        </video>
    </section>

   

    
@endsection
