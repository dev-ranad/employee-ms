
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Employee Panel</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('src/public/admin/css/app.min.css') }}">
  {{-- <link rel="stylesheet" href="assets/css/app.min.css"> --}}
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('src/public/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('src/public/admin/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('src/public/admin/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('src/public/admin/img/favicon.ico') }}"/>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container" style="margin-top:13%;">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header text-center">
                <h3 class="m-auto">Employee Panel</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('enter.request') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <input id="username" type="text" placeholder="Username" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Enter
                    </button>
                  </div>
                </form>
                <div class="form-group">
                  <a type="button" class="btn btn-danger btn-lg btn-block text-white" href="{{ route('redirect.to.google') }}" tabindex="4">
                    Login with Google
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('src/public/admin/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('src/public/admin/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('src/public/admin/js/custom.js') }}"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
