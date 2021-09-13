@extends('theme.default')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<section class="content">
      <div class="container-fluid">
          <a href="{{route('role.create')}}" class="btn btn-primary active my-4 float-right" role="button">Add New</a>
<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach($roles as $role)
 <tr>
 <td>{{++$i}}</td>
   <td>{{$role->name}}</td>
   <td>
       <a class="btn btn-info" href="{{route('role.show',$role->id)}}">Show</a>
       @can('role-edit')
        <a class="btn btn-primary" href="{{route('role.edit',$role->id)}}">Edit</a>
        @endcan
        @can('role-delete')
            {!! Form::open(['method' => 'POST','route' => ['role.destroy',$role->id], 'style' => 'display:inline']) !!}
                {!!Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}    
        @endcan
   </td>
 </tr>
 @endforeach
 
</table>

@endsection