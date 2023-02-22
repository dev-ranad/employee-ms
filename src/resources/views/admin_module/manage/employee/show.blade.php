@extends('admin_module.panel_lib.layouts.app')
@push('style')
@endpush
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-4 m-auto">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img alt="image" src="{{ asset('src/public/upload/employee/'. $item->details->photo) }}"
                                        class="rounded-circle author-box-picture m-auto">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                        <a href="#">{{ $item->name() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Employee Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Country
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $item->details->country }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            State
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $item->details->state }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            City
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $item->details->city }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Zip Code
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $item->details->zip_code }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Address
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $item->details->address }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Skills</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Java</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-primary" data-width="70%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Web Design</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-warning" data-width="80%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Photoshop</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-green" data-width="48%"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
