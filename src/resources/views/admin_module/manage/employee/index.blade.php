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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->name() }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->contact->contact_number }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                    <a href="#" class="badge badge-success">Active</a>
                                                    @else
                                                    <a href="#" class="badge badge-danger">Banned</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.employee.get_data_details', $item->id) }}" class="btn btn-icon btn-primary"><i class="far fa-file"></i></a>
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
