@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Registration Form</h1>
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
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              
              <form method="post" action="{{ route('employee.employeemanagement.store') }}">
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="InputName">Employee ID</label>
                    <input type="text" class="form-control @error('empid') is-invalid @enderror" id="Inputempid" name="empid" placeholder="Enter Employee Id" value ="{{ old('empid') }}">

                    @error('empid')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="InputName">Name</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="InputName" name="username" placeholder="Enter Name" value ="{{ old('username') }}">
                    @error('username')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputDesignation">Designation</label>
                    <input type="text" class="form-control @error('userdesignation') is-invalid @enderror"  id="InputDesignation" name="userdesignation" placeholder="Enter Designation" value ="{{ old('userdesignation') }}">
                    @error('userdesignation')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputAge">Age</label>
                    <input type="text" class="form-control @error('userage') is-invalid @enderror" id="InputAge" name="userage" placeholder="Enter Age" value ="{{ old('userage') }}">
                    @error('userage')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputAdress">Address</label>
                    <input type="text" class="form-control @error('useraddress') is-invalid @enderror" id="InputAdress" name="useraddress" placeholder="Enter Address" value ="{{ old('useraddress') }}">
                    @error('useraddress')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" class="form-control @error('useremailid') is-invalid @enderror" id="InputEmail " name="useremailid" placeholder="Enter email" value ="{{ old('useremailid') }}">
                    @error('useremailid')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="InputJoiningDate">Joining Date</label>
                    <input type="text" class="form-control @error('joining_date') is-invalid @enderror" id="InputJoiningDate " name="joining_date" placeholder="Enter Joining Date" value ="{{ old('joining_date') }}">
                    @error('joining_date')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
