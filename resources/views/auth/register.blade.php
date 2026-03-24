<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset('adminlte/index2.html')}}"><b>2fa2</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      {{-- ALERT --}}
@if (session('failed'))
<div class="alert alert-danger">{{ session('failed') }}</div>
@endif
<p class="login-box-msg">Register here</p>
<form action="/register" method="post">
@csrf
{{-- NAME --}}
<div class="input-group mb-2">
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
@error('name')
<small class="text-danger d-block mb-2">{{ $message }}</small>
@enderror
{{-- EMAIL --}}
<div class="input-group mb-2">
<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
@error('email')
<small class="text-danger d-block mb-2">{{ $message }}</small>
@enderror
{{-- PASSWORD --}}
<div class="input-group mb-2">
<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
<div class="input-group-append show-password" style="cursor:pointer;">
<div class="input-group-text">
<span class="fas fa-lock" id="password-lock"></span>
</div>
</div>
</div>
@error('password')
<small class="text-danger d-block mb-2">{{ $message }}</small>
@enderror
{{-- CONFIRM PASSWORD --}}
<div class="input-group mb-3">
<input type="password" name="confirm_password" id="confirm-password" class="form-control" placeholder="Confirm Password">
<div class="input-group-append show-confirm-password" style="cursor:pointer;">
<div class="input-group-text">
<span class="fas fa-lock" id="confirm-password-lock"></span>
</div>
</div>
</div>
{{-- BUTTON --}}
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary btn-block">Register</button>
</div>
</div>
</form>
{{-- SOCIAL LOGIN --}}
<div class="social-auth-links text-center mt-3">
<p class="mb-3 text-muted">— OR —</p>
<a href="#" class="btn btn-block btn-primary mb-2">
<i class="fab fa-facebook-f mr-2"></i>
Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google mr-2"></i>
Sign in using Google
</a>
</div>
{{-- LOGIN LINK --}}
<p class="mt-3 text-center">
Already have an account?
<a href="/login">Login here</a>
</p>
</div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script>
    $('.show-password').on('click',function(){
        if($('#password').attr('type') == 'password'){
            $('#password').attr('type','text');
            $('#password lock').attr('class','fas fa-unlock');
        }else{
            $('#password').attr('type','password');
            $('#password lock').attr('class','fas fa-lock');
        }

    })
    $('.show-confirm-password').on('click',function(){
        if($('#confirm-password').attr('type') == 'password'){
            $('#confirm-password').attr('type','text');
            $('#confirm-password lock').attr('class','fas fa-unlock');
        }else{
            $('#confirm-password').attr('type','password');
            $('#confirm-password lock').attr('class','fas fa-lock');
        }

    })
</script>
</body>
</html>
