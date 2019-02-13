<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{asset('themes/Front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('themes/Front/css/error.css')}}">
</head>
<body>
<div id="wrapper">
    <div id="error-panel">
    <div id="icon-container">
    <img src="{{asset('themes/Front/img/error.png')}}" id="icon" /> 
    </div>
    <div id="text-area">
        <h1>OOPS!</h1>
        <h3>404 NOT FOUND!</h3>
        <div class="clearfix"></div>
        <p>Share secrets, not hate.</p>
    </div>

    <a href="{{url('/')}}" class="btn btn-primary error" type="button" id="go-back">Go Back  </a>
  </div>
</div>
</body>
</html>
