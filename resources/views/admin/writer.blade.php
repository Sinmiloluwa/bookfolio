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
              <li class="breadcrumb-item active">Writers</li>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('message'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>
              {{ session()->get('message')}}
          </div>
          @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Writers</h3>
                <span><a name="" id="" class="btn btn-primary float-right" href="{{route('writer.unverified')}}" role="button">Unverified</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th style="width:15%">Email</th>
                    <th style="width:25%">Document</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              @foreach($writers as $writer)
                  <tr>
                    <td>{{ucfirst($writer->name)}}</td>
                    <td>{{$writer->email}}</td>
                    <td>{{$writer->document}}</td>
                    <td><a href="{{route('writer.verifiedShow',$writer->id)}}" class="btn btn-secondary btn-sm active" role="button">View</a>    
                    {!! Form::open(['method' => 'POST','route' => ['writer.delete',$writer->id], 'style' => 'display:inline']) !!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!} 
                    </td>
                   
                  </tr>
               @endforeach   
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
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
    <!-- /.content -->
  </div>

@endsection