<nav class="pcoded-navbar">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">
			<div class="pcoded-navigation-label">Administración</div>
				<ul class="pcoded-item pcoded-left-item">				
					<li id="changePassword">
						<a href="#!" class=" waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
							<span class="pcoded-mtext">Cambiar Contraseña</span>
						</a>
					</li>
				</ul>

				<div class="pcoded-navigation-label">Navegación</div>
				<ul class="pcoded-item pcoded-left-item">
					@can('alumno.index')
					<li class=" ">
						<a href="{{route('alumno.index')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-users"></i>
							</span>
							<span class="pcoded-mtext">Gestión Alumnos</span>
						</a>
					</li>
					@endcan
					@can('capacitacion.index')
					<li class="">
						<a href="{{route('capacitacion.index')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-clipboard"></i>
							</span>
							<span class="pcoded-mtext">Capacitacion</span>
						</a>
					</li>
					@endcan
					@can('certificado.index')
					<li class="">
						<a href="{{route('certificado.index')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-award"></i>
							</span>
							<span class="pcoded-mtext">Certificados</span>
						</a>
					</li>
					@endcan
					@can('solicitud.index')
					<li class="">
						<a href="{{route('solicitudCertificado.index')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-star"></i>
							</span>
							<span class="pcoded-mtext">Solicitudes</span>
						</a>
					</li>
					@endcan
					@can('perfil.index')
					<li class="">
						<a href="{{route('miperfil')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-user"></i>
							</span>
							<span class="pcoded-mtext">Mi Perfil</span>
						</a>
					</li>
					@endcan
					@can('certificadoalumno.index')
					<li class="">
						<a href="{{route('micertifiado')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon">
								<i class="feather icon-award"></i>
							</span>
							<span class="pcoded-mtext">Mis Certificados</span>
						</a>
					</li>
					@endcan
				</ul>

			
				<div class=" d-block d-sm-block d-md-none container mt-5px">
				<a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
														 <button class="btn btn-outline-danger btn-block"><i class="feather icon-log-out">
														</i>Cerrar Sesión
														 </button>
														 
											
										</a>
				</div>
				
		</div>
	</div>
	
</nav>