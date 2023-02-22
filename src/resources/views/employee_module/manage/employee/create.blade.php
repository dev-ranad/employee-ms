@extends('employee_module.panel_lib.layouts.app')
@push('style')
@endpush
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.employee.post_data_save') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Create Employee</h4>
                                        <div class="buttons">
                                            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                                            <button type="submit" class="btn btn-primary">Store</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee Email</label>
                                                <input type="email" name="email" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control" id="password" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password Genarate</label>
                                                <button id="gen_password" class="w-100 btn btn-primary"><i
                                                        class="las la-key me-2"></i> Genarate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Employee Contact Info</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Name</label>
                                                <input type="text" name="contact_name" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Email</label>
                                                <input type="text" name="contact_email" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contact Phone Number</label>
                                                <input type="tel" name="contact_number" class="form-control" required="">
                                                <div class="invalid-feedback">Please fill your input</div>
                                                <div class="valid-feedback">Input filled</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Employee Details</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 col-md-8 col-lg-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" name="country" class="form-control" required="">
                                                        <div class="invalid-feedback">Please fill your input</div>
                                                        <div class="valid-feedback">Input filled</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" name="state" class="form-control" required="">
                                                        <div class="invalid-feedback">Please fill your input</div>
                                                        <div class="valid-feedback">Input filled</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" name="city" class="form-control" required="">
                                                        <div class="invalid-feedback">Please fill your input</div>
                                                        <div class="valid-feedback">Input filled</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Zip Code</label>
                                                        <input type="text" name="zip_code" class="form-control" required="">
                                                        <div class="invalid-feedback">Please fill your input</div>
                                                        <div class="valid-feedback">Input filled</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" name="address" class="form-control" required="">
                                                        <div class="invalid-feedback">Please fill your input</div>
                                                        <div class="valid-feedback">Input filled</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Photo</label>
                                                        <div class="dropzone" id="mydropzone">
                                                            <div class="fallback">
                                                                <input name="photo" type="file" required=""/>
                                                                <div class="invalid-feedback">Please fill your input</div>
                                                                <div class="valid-feedback">Input filled</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        $('#gen_password').on('click', function(e) {
            e.preventDefault();
            var nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
            var alpha = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                'u',
                'v', 'w', 'x', 'y', 'z'
            ];
            var icons = ['?', '!', '@', '#', '$', '%', '&', '*', '(', ')'];
            var all = nums.concat(alpha.concat(icons.concat(nums.concat(icons.concat(alpha)))));
            shuffle(all);
            shuffle(all);
            shuffle(all);
            all = all.join('');
            all = all.slice(6, 20);
            document.getElementById('password').value = all;
        });

        function shuffle(a) {
            var j, x, i;
            for (i = a.length - 1; i > 0; i--) {
                j = Math.floor(Math.random() * (i + 1));
                x = a[i];
                a[i] = a[j];
                a[j] = x;
            }
        }
    </script>
@endpush
