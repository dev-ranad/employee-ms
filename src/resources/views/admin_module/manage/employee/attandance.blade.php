@extends('admin_module.panel_lib.layouts.app')
@push('style')
@endpush
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
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
            </div>
        </section>
    </div>
@endsection
@push('script')
@endpush
