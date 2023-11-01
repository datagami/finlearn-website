@extends('layouts.main')
@section('admindashboard')


<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- ... Your existing code ... -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- ... Your existing code ... -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="GET" action="{{ route('enquireslist') }}">
                                @csrf
                                <!-- ... Your existing form elements ... -->
                                <div class="row mt-2">
                                    <div class="form-group mx-2">
                                        <label class="form-label" for="from_date">From Date</label>
                                        <input class="form-control" type="date" id="from_date" value="{{$from_date}}"
                                            max="{{date('Y-m-d')}}" name="from_date">
                                    </div>
                                    <div class="form-group mx-2">
                                        <label class="form-label" for="to_date">To Date</label>
                                        <input class="form-control" type="date" id="to_date" value="{{$to_date}}"
                                            max="{{date('Y-m-d')}}" name="to_date">
                                    </div>
                                    <div class="form-group mx-2">
                                        <br>
                                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </div>
                            </form>

                            <table id="enquire_table" class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date & Time</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $key = 1; // Initialize the serial number variable
                                    @endphp
                                    @foreach ($enquires as $item)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>                                           
                                            <a href="{{ route('enquiresview', $item->id) }}" type="button"
                                            class="btn btn-success"> <span class="text">View</span></a>
                                        </td>   
                                            
                                            <td>
                                           <form class="enquiry-form" action="{{route('enquire.delete')}}" method="POST">
                                               @csrf
                                              @method('delete')
                                              <input type="hidden" name="enquiry_id" value="{{ base64_encode($item->id) }}">
                                              <button type="submit" class="btn btn-danger">Delete</a>
                                           </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
</div>
<!-- /.content -->
@endsection


<script>
$('.enquiry-form').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really  Want to Delete this Enquiry!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            e.currentTarget.submit();
        } else {
            toastr.error('Deletion Cancelled');
        }
    })
});
</script>
