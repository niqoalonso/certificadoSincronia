
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
    <div class="navbar-logo">
    <a href="{{route('homebackend')}}">
		<img class="img-fluid" style="margin: auto; display:inline-block;" src="{{asset('frontend/img/logo.png')}}" width="70%" alt="Theme-Logo" />
    </a>
    <a class="mobile-menu" id="mobile-collapse" href="#!">
    <i class="feather icon-menu icon-toggle-right"></i>
    </a>
    <a class="mobile-options waves-effect waves-light">
      <i class="feather icon-more-horizontal"></i>
    </a>
    </div>
    <div class="navbar-container container-fluid">
    <ul class="nav-left">
    <li>
    <a href="#" onclick="if (!window.__cfRLUnblockHandlers) return true; javascript:toggleFullScreen()" class="waves-effect waves-light" data-cf-modified-d2d1d6e2f87cbebdf4013b26-="">
      <i class="full-screen feather icon-maximize"></i>
    </a>
    </li>
    </ul>
    <ul class="nav-right">
		<li class="user-profile header-notification">
			<div class="dropdown-primary dropdown">
			<div class="dropdown-toggle" data-toggle="dropdown">
			<span>{{Auth()->User()->nombres}} {{Auth()->User()->apellidos}}</span>
			<i class="feather icon-chevron-down"></i>
			</div>
			<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
			<li>
			
			<a class="dropdown-item" href="{{ route('logout') }}"
										   onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
														 <i class="feather icon-log-out">
														</i>
											Cerrar Sesión
										</a>
	
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
			</li>
			</ul>
			</div>
			</li>
    </ul>
    </div>
    </div>
    </nav>