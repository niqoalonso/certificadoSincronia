<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>SINCRONÍA OTEC | Certificación</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <meta name="_token" content="{{csrf_token()}}" />

    <link href="{{asset('frontend/img/favicon.png')}}" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.min.css')}}">

    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="{{asset('backend/css/waves.min.css')}}" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/feather.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/font-awesome-n.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/icofont.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/notification.css')}}"> 

    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}" />

    <link rel="stylesheet" href="{{asset('backend/css/chartist.css')}}" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/component.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/widget.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages.css')}}">
	
</head>
<body>

<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
        
            @include('layouts.backend.parciales.menu')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    
                    @include('layouts.backend.parciales.left-menu')

                    <div class="pcoded-content">
                        @yield('content')
                    </div>

                </div>
            </div>

        </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formPassword">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm cancelarPassword" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning btn-sm">Cambiar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script data-cfasync="false" src="{{asset('backend/js/email-decode.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backend/js/waves.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>



<script src="{{asset('backend/js/amcharts.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/serial.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/light.js')}}" type="text/javascript"></script>

<script src="{{asset('backend/js/pcoded.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/vertical-layout.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('backend/js/script.min.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>

	<script type="text/javascript" src="{{asset('backend/js/chartist.js')}}"></script>


	<script type="text/javascript" src="{{asset('backend/js/bootstrap-growl.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/notification.js')}}"></script> 

	<script type="text/javascript" src="{{asset('backend/js/pcoded.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/vertical-layout.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/script.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('backend/js/select2.full.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/bootstrap-multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/jquery.multi-select.js')}}"></script>	
	<script type="text/javascript" src="{{asset('backend/js/select2-custom.js')}}"></script>

	<script type="text/javascript" src="{{asset('backend/js/modernizr.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/css-scrollbars.js')}}"></script>

	<script type="text/javascript" src="{{asset('backend/js/sweetalert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/modal.js')}}"></script>


	<script src="{{asset('backend/js/classie.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('backend/js/modaleffects.js')}}"></script>
	<script src="{{asset('backend/js/pcoded.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/js/vertical-layout.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('backend/js/jquery.mcustomscrollbar.concat.min.js')}}" type="text/javascript"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


	<script src="{{asset('backend/js/rocket-loader.min.js')}}" data-cf-settings="2d8d78e876b340f9029c575b-|49" defer=""></script>
    <script src="{{asset('backend/js/system/ajax-password.js')}}" data-cf-settings="2d8d78e876b340f9029c575b-|49" defer=""></script>

	@yield('js')

</body>

</html>
