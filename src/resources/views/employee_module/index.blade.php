@extends('employee_module.panel_lib.layouts.app')
@push('style')
@endpush
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row ">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Total Present</h5>
                                        <h2 class="mb-3 font-18">{{ $totalPre }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Today Absence</h5>
                                        <h2 class="mb-3 font-18">{{ $totalAbs }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Office Hour</h5>
                                        <h2 class="mb-3 font-18">10.00 AM  06.00 PM</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>All Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Check In Date</th>
                                        <th>Check In Time</th>
                                        <th>Check Out Date</th>
                                        <th>Check Out Time</th>
                                        <th>Work Hours</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->in_date ?? 'N/A' }}</td>
                                            <td>{{ $item->in_time ?? 'N/A' }}</td>
                                            <td>{{ $item->out_date ?? 'N/A' }}</td>
                                            <td>{{ $item->out_time ?? 'N/A' }}</td>
                                            <td>{{ $item->hours ?? 0 }} Hours</td>
                                            <td>
                                                @if ($item->status == 'On Duty')
                                                    <a href="#"
                                                        class="badge badge-info">{{ $item->status }}</a>
                                                @elseif($item->status == 'Present')
                                                    <a href="#"
                                                        class="badge badge-success">{{ $item->status }}</a>
                                                @else
                                                    <a href="#"
                                                        class="badge badge-danger">{{ $item->status }}</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('script')
@endpush
