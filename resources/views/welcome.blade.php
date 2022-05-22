<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/icons/css/line-awesome.css') }}">

  <link href="{{ asset('theme/css/select2.min.css') }}" rel="stylesheet" />

  <title>majoo</title>
  <style>
    .welcome {
      width: 400px;
      margin: 10% auto;
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="welcome">
    <h1 class="comforta-font">majoo</h1>
    <p>aplikasi wirausaha</p>
    <br>
    <a href="{{url('/login')}}">Login</a> | 
    <a href="{{url('/register')}}">Register</a>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('theme/js/jquery-3.5.1.slim.min.js') }}"></script>
  <script src="{{ asset('theme/js/popper.min.js') }}"></script>
  <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('theme/js/jquery1-9-1.js') }}"></script>
  <script src="{{ asset('theme/js/select2.min.js') }}"></script>
  <script src="{{ asset('theme/js/form.js') }}"></script>


</body>

</html>