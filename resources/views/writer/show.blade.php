@extends('theme.default')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Books</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Books</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ucfirst($book->name)}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                        <div class="title pb-4">
                           <h2>Title:</h2>  {{$book->name}}
                        </div>
                        <div class="description">
                           <h3>Description:</h3>  {{$book->description}}
                        </div>
                        <div class="author py-4">
                           <h3>Author:</h3>  {{$book->author}}
                        </div>
                        <div class="rating">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{url('uploads/images/',$book->book_cover)}}" style="width: 400px; height: 300px;">
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


    

@endsection    