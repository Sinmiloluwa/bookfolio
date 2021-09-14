@extends('theme.default')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">BookView</li>
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
                <h3 class="card-title">Edit {{ucfirst($book->name)}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form class="" method="post" action="{{route('writer.update',$book->id)}}" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$book->name}}">
                </div>

                <div class="form-group">
                  <label for="title">Description</label>
                  <textarea class="form-control" value="{{$book->description}}" name="desc">{{$book->description}}</textarea>
                </div>

                <div class="form-group">
                  <label for="title">Author</label>
                  <input type="text" name="author" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$book->author}}">
                </div>

                <div class="form-group">
                  <label for="title">Date Released</label>
                  <input type="text" name="date" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$book->date_released}}">
                </div>

                <div class="form-group">
                  <label for="title">Book Cover</label>
                  <input type="file" name="cover" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$book->book_cover}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                  </form>
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