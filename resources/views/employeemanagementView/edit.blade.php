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
              <form method="post" action="{{ route('employee.employeemanagement.update',$editemployeedata->id) }}">
              @method('PATCH')
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="InputName">Employee ID</label>
                    <input type="text" class="form-control" id="Inputempid" name="empid" placeholder="Enter Employee Id" value="{{ $editemployeedata->employeeid }}">
                  </div>

                <div class="form-group">
                    <label for="InputName">Name</label>
                    <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter Name" value="{{ $editemployeedata->name}}">
                  </div>
                  <div class="form-group">
                    <label for="InputDesignation">Designation</label>
                    <input type="text" class="form-control" id="InputDesignation" name="designation" placeholder="Enter Designation" value="{{ $editemployeedata->designation}}">
                  </div>
                  <div class="form-group">
                    <label for="InputEmail">Age</label>
                    <input type="text" class="form-control" id="InputEmail" name="age" placeholder="Enter email" value="{{ $editemployeedata->age}}">
                  </div>
                  <div class="form-group">
                    <label for="InputAdress">Address</label>
                    <input type="text" class="form-control" id="InputAdress" name="address" placeholder="Enter Address" value="{{ $editemployeedata->address}}">
                  </div>
                  <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="{{ $editemployeedata->emailid}}">
                  </div>

                  <div class="form-group">
                    <label for="InputDate">Joining Date </label>
                    <input type="text" class="form-control" id="InputDate" name="joining_date" placeholder="Enter Date" value="{{ $editemployeedata->joining_date}}">
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
