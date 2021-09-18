@extends('theme.default')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Writers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Verified Writers</li>
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
                <h3 class="card-title">{{ucfirst($verifiedWriter->name)}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                    <div class="col-md-6">
                        <div class="title pb-4">
                           <h2>Name:</h2>  {{$verifiedWriter->name}}
                        </div>
                        <div class="description">
                           <h3>Email:</h3>  {{$verifiedWriter->email}}
                        </div>
                        <div class="author py-4">
                           <h3>Document:</h3>  <a href="{{url('uploads/images/verify/',$verifiedWriter->document)}}" target="blank">{{$unverifiedWriter->document}}</a>
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