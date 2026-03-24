<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | OTP Verification</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">

<div class="login-box">
  
  <div class="login-logo">
    <a href="#"><b>2FA</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">

      {{-- ERROR MESSAGE --}}
      @if (session('failed'))
        <div class="alert alert-danger">
          {{ session('failed') }}
        </div>
      @endif

      {{-- FORM OTP --}}
      <form action="/verify/{{ $unique_id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group mb-3">
          <input type="number" name="otp" class="form-control" placeholder="Enter OTP" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              Submit
            </button>
          </div>
        </div>

      </form>

      <p class="mb-0 mt-3 text-center">
        <a href="#!" class="text-center">Resend OTP</a>
      </p>

    </div>
  </div>

</div>

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>