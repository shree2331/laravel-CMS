@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Leave Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave Record</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
      
            <div class="card">
              <div class="card-header">
             
                  <h3 class="card-title">Total Records () </h3>
                   <a href="{{ route('leaverecords.employeeleaverecords.create') }}" class="btn btn-info btn-sm float-right">Add Record</a>

              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('status'))
                  <div class="alert alert-success">
                  {{ session('status') }}
                  </div>
                  @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Emp Id</th>
                    <th>No Of Leaves</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @if(count($employeeleaverecords))

                  @foreach($employeeleaverecords as $emp)
                    <tr>
                      <td>{{ $emp->record_id }}</td>
                      <td>{{ $emp->employeeid}}</td>
                      <td>{{ $emp->name}}</td>
                      <td>{{ $emp->from_date}}</td>
                      <td>{{ $emp->to_date}}</td>
                      <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm">Action</button>
                                <button type="button" class="btn btn-info  btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">View Details</a>
                                   <form action="{{ route('leaverecords.employeeleaverecords.destroy',$emp->record_id)}}" method="POST">

                                      @csrf
                                      @method('DELETE')
                                       <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                    </form>

                                  <a class="dropdown-item" href="#">Approve</a>
                                  
                                </div>
                            </div>
                      </td>
                      
                    </tr>
                  @endforeach
                  @else
                    <tr><td colspan=7>No Data Found</td></tr>
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
