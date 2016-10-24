<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/awesome-bootstrap-checkbox/1.0.0-alpha.4/awesome-bootstrap-checkbox.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.css">
  <link rel="stylesheet" href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.css">
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
<footer style="position: absolute; bottom: 0; background-color: #f5f5f5; height: 60px; width: 100%;">
  <div class="container">
    <p></p>
    <p align="center" class="text-muted">@Bigdata</p>
  </div>
</footer>

<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-select/2.0.0-beta1/js/bootstrap-select.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-checkbox/1.4.0/bootstrap-checkbox.min.js"></script>
<script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
<script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.js"></script>
<script src="//cdn.bootcss.com/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".selectpicker").selectpicker();
    $(".checkboxpicker").checkboxpicker();
    PNotify.prototype.options.styling = "bootstrap3";
    @if($errors->any())
    @foreach($errors->get('notify.*') as $errortype => $error)
    new PNotify({
      title: '{{explode('|', $error[0])[0]}}',
      text: '{{explode('|', $error[0])[1]}}',
      type: '{{explode('.', $errortype)[1]}}',
      buttons: {
        sticker: false,
      }
    });
    @endforeach
    @foreach($errors->toArray() as $errortype => $error)
    @if(!strstr($errortype, "notify."))
    new PNotify({
      title: 'Input error',
      text: '{{$error[0]}}',
      type: 'error',
      buttons: {
        sticker: false,
      }
    });
    @endif
    @endforeach
    @endif
  });
</script>
</body>
</html>