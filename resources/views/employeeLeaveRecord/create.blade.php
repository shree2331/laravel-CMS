@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Leave Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave Form</li>
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
                <h3 class="card-title">Leave Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              
              <form method="post" action="{{ route('leaverecords.employeeleaverecords.store') }}" enctype="multipart/form-data">
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
                    <label for="InputNoLeave">No Of Leaves</label>
                    <input type="text" class="form-control @error('no_of_leaves') is-invalid @enderror" id="InputNoLeave" name="no_of_leaves" placeholder="Enter No Of Leaves" value ="{{ old('no_of_leaves') }}">

                    @error('no_of_leaves')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="InputReason">Reason Of Leaves</label>
                    <input type="text" class="form-control @error('no_of_leaves') is-invalid @enderror" id="InputReason" name="reason_of_leave" placeholder="Enter Reason of Leaves" value ="{{ old('reason_of_leave') }}">

                    @error('reason_of_leave')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation" name="date_range">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label for="Inputdocs">Supporting Docs</label>
                    <input type="file" class="form-control @error('file_name') is-invalid @enderror" id="Inputdocs" name="file_name" placeholder="Upload Files" value ="{{ old('file_name') }}">

                    @error('reason_of_leave')
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
  @section('scripts')
  <script>
      jQuery(document).ready(function(){
  
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM-DD-YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  
})

</script>
@endsection
@endsection
