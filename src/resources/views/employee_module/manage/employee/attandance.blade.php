@extends('employee_module.panel_lib.layouts.app')
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
                                    <img alt="image"
                                        src="{{ asset('src/public/upload/employee/' . $item->details->photo) }}"
                                        class="rounded-circle author-box-picture m-auto">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                        <a href="#">{{ $item->name() }}</a>
                                    </div>
                                    <div class="centrify mt-3">
                                        <h1 id="clicked">PRESS AND HOLD THE BUTTON</h1>
                                        <button class="confBtn">
                                            <div></div>
                                            <span class="press">PRESS</span>
                                                <img src="https://cdn.dribbble.com/users/1056963/screenshots/5953625/cut1.gif" class="watch-loader d-none" alt="">
                                        </button>
                                    </div>
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
    <script>
        "use strict";

        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date + ' ' + time;

        var tm;
        $(".confBtn").mouseup(function() {
            clearTimeout(tm);
            return;
        });
        $(".confBtn").mousedown(function() {
            tm = window.setTimeout(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = "{{ Illuminate\Support\Facades\Auth::guard('employee')->id() }}";
                var url = "{{ route('take.attandance') }}";
                $.ajax({
                    type: "post",
                    url: url,
                    dataType: "json",
                    data: {
                        id: id,
                        date: date,
                        time: time,
                    },
                    beforeSend: function() {
                        $('.watch-loader').html("");
                        $('.watch-loader').removeClass('d-none');
                        $('.press').addClass('d-none');
                    },
                    success: function(response) {
                        if (response.status == 400) {
                            $('.watch-loader').html("");
                            $('.press').removeClass('d-none');
                            $('.watch-loader').addClass('d-none');
                            $('#clicked').text(response.message);
                            console.log(response.message);
                        } else if (response.status == 200) {
                            $('.watch-loader').html("");
                            $('.watch-loader').addClass('d-none');
                            $('.press').removeClass('d-none');
                            $('#clicked').text(response.message);
                        }
                    }
                });
            }, 2000);
            return;
        });
    </script>
@endpush
