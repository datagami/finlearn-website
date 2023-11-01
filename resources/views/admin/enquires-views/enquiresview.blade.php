@extends('layouts.main')
@section('admindashboard')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-header">
                        INFORMATION
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Name:</td>

                                    <td>{{ $enquire->name }}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>

                                    <td>{{ $enquire->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email ID:</td>

                                    <td>{{ $enquire->email }}</td>
                                </tr>
                                <tr>
                                    <td>City:</td>

                                    <td>{{ $enquire->city }}</td>
                                </tr>
                                <tr>
                                    <td>Experience:</td>

                                    <td>{{ $enquire->exp_yrs .' Years - '. $enquire->months. ' Months' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection