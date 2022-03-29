@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Registration Form</li>
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
             
                  <h3 class="card-title">Total Employees ( {{ $employees->total() }}) </h3>
                   <a href="{{ route('employee.employeemanagement.create') }}" class="btn btn-info btn-sm float-right">Add employee</a>
                  
                
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
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Designation</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($employees))

                  @foreach($employees as $emp)
                  <tr>
                    <td>{{ $emp->id}}</td>
                    <td>{{ $emp->employeeid}}
                    </td>
                    <td>{{ $emp->name}}</td>
                    <td> {{ $emp->emailid}}</td>
                    <td>{{ $emp->designation}}</td>
                    <td><a href="{{route('employee.employeemanagement.edit',$emp->id)}}" class="btn btn-block bg-gradient-primary btn-sm">Edit</a></td>
                    <td>  

                      <form  method="post" action="{{ route('employee.employeemanagement.destroy',$emp->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete user">
                      </form>
                    
                  </td>
                  </tr>
                  @endforeach
                  @else
                  <tr><td colspan=3>No Data Found</td></tr>
                  @endif
                  </tbody>
              
                </table>
                
                   {{$employees->links()}}
               
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
