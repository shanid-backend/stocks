<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset('assets/bootstrap-5.1.0-dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Sign Page Css -->
<link href="{{ asset('assets/signin.css')}}" rel="stylesheet">
<link href="{{ asset('assets/app.css')}}" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="{{asset('assets/ladda/spin.min.js')}}"></script>
<script src="{{asset('assets/ladda/ladda.min.js')}}"></script>
<script src="{{asset('assets/toastify/toastify.js')}}"></script>
<script src="{{asset('assets/toastify/toastify.js')}}"></script>

<script type="text/javascript">
    var base_url = '{{url("/")}}'
</script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    @yield('content')
    
