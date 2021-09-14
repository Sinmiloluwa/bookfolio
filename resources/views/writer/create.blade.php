@extends('theme.default')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create New Book</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">

    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ Form::open(['route' => 'writer.store','method'=>'POST', 'enctype' => 'multipart/form-data']) }}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Name:</strong>
              {{ Form::text('name',null,['placeholder' => 'Name', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Description:</strong>
              {{ Form::text('description',null,['placeholder' => 'Description', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Book Cover:</strong>
              {{Form::file('cover', ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Book Pdf:</strong>
              {{Form::file('pdf', ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {{ Form::close() }}
      </div>
    </section>
@endsection