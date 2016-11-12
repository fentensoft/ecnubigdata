<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/freelancer.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('styles')
</head>
<body>
@yield('body')
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/startbootstrap-freelancer/3.3.7+1/js/freelancer.min.js"></script>
@yield('scripts')
</body>
</html>