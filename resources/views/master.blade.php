<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/awesome-bootstrap-checkbox/1.0.0-alpha.4/awesome-bootstrap-checkbox.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.css">
</head>
<body>
	
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bigdata</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@yield('content')

<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-checkbox/1.4.0/bootstrap-checkbox.min.js"></script>
<script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".selectpicker").selectpicker();
    $(".checkboxpicker").checkboxpicker();
    PNotify.prototype.options.styling = "bootstrap3";
    @if($errors->any())
      @foreach($errors->get('notify.*') as $errortype => $error)
            new PNotify({
              title: 'Notification',
              text: '{{$error[0]}}',
              type: '{{explode('.', $errortype)[1]}}'
            });
      @endforeach
    @endif
  });
</script>
</body>
</html>