<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Ingreso | SINCRONÍA OTEC CERTIFICADO</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('backend/css/waves.min.css')}}" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="{{asset('backend/css/feather.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/css/themify-icons.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/css/icofont.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages.css')}}">
</head>

<body themebg-pattern="theme1">

<div class="theme-loader">
<div class="loader-track">
<div class="preloader-wrapper">
<div class="spinner-layer spinner-blue">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-yellow">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-green">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
</div>
</div>

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<form method="POST" action="{{ route('login') }}" class="md-float-material form-material">
        @csrf
<div class="text-center">
<img src="{{asset('frontend/img/logo.png')}}" width="20%" alt="logo.png" class="mb-5 mt-5">
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">INICIO SESIÓN</h3>
</div>
</div>
<p class="text-muted text-center p-b-5">Ingrese sus credenciales de acceso</p>
<div class="form-group form-primary">
<input type="text" class="form-control" name="rut" id="input_dni" onkeyup="checkRut(this)"" required="">
<span class="form-bar"></span>
<label class="float-label">RUT</label>
</div>
<div class="form-group form-primary">
<input type="password" name="password" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">CONTRASEÑA</label>
</div>
<div class="row m-t-25 text-left">
<div class="col-12">
<div class="checkbox-fade fade-in-primary">
<label>
<input type="checkbox" value="">
<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
<span class="text-inverse">Recordarme</span>
</label>
</div>
</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 btn-rut" disabled>INGRESAR</button>
</div>
</div>
</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>


<script type="text/javascript" src="{{asset('backend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backend/js/waves.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('backend/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/css-scrollbars.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/common-pages.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
<script type="text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="{{asset('backend/js/rocket-loader.min.js')}}"></script></body>

<script src="{{asset('backend/js/system/valida-rut-login.js')}}" type="text/javascript"></script>


</html>
