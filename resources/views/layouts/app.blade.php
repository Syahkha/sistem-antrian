<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/modules/fontawesome/css/all.css')}}" >

   <!-- CSS Libraries -->


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
</head>
<body>
@yield('content')
  <!-- Template JS File -->

  <script src="{{asset('admin/modules/bootstrap/js/bootstrap.min.js')}}" ></script>  
  <script src="{{asset('admin/js/stisla.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <script src="{{asset('admin/js/custom.js')}}"></script>

</body>
</html>
