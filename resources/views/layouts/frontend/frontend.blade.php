<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SINCRONÍA CERTIFICADOS</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <meta name="_token" content="{{csrf_token()}}" />

  <!-- Favicons -->
  <link href="{{asset('frontend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('frontend/js/toastr/toastr.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
  


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <?php $host = $_SERVER["REQUEST_URI"];?>
    <h1 class="logo"><a href="{{route('home.index')}}"><img src="{{asset('frontend/img/logo.png')}}" alt=""> </a></h1>  

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="@if(Request::path() == '/') active @endif"><a href="{{route('home.index')}}">Inicio</a></li>
          <li class="@if(Request::path() == 'certificacion') active @endif"><a href="{{route('certificacion')}}">Certificado</a></li>
          <li class="@if(Request::path() == 'contactenos') active @endif"><a href="{{route('contactenos')}}">Contáctanos</a></li>
          <div class="d-block d-sm-block d-md-none">
          <li><a href="{{route('login')}}">Ingreso Plataforma</a></li>
          </div>
        </ul>
      </nav>

      <div class="d-none d-sm-none d-md-block">
        <div class="header-social-links">
          <a href="{{route('login')}}"><button class="btn btn-warning" style="border-radius: 20px; color: white; background: #ff9900;"><small> Ingreso Plataforma </small></button></a>
        </div>
      </div>

    </div>
  </header>

  @yield('content')
  
  @include('layouts.frontend.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>

  <script src="{{asset('frontend/js/toastr/toastr.min.js')}}"></script>



  <!-- Template Main JS File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>

  @yield('js')

</body>

</html>