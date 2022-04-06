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
                  
                   <form class="form-inline pull-right" method="GET">
                     <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="search" class="form-control" placeholder="search" value="" name="search" id="search">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                 </form>
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

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
$('#search').on('keyup',function(){
  
  $value =$(this).val();
  $.ajax({
  url : "{{ route('employee.employeemanagement.index') }}",
  type : 'get',
  data: {'search':$value},
    success:function(data){
      //console.log(data);
          $('tbody').html(data);
    }
  });
 })
})
</script>
<script type="text/javascript">
   $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@stop
