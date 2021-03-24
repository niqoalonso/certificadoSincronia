@extends('layouts.backend.backend')

@section('content')
		<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-users bg-c-blue"></i>
						<div class="d-inline">
							<h5>Mi Perfil</h5>
							<span>Administra información tu perfil, si requires actualizar otro tipo de inforamacion, envianos una solicitud.</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="pcoded-inner-content">
			<div class="main-body">
				<div class="page-wrapper">
					<div class="page-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="card inscripcion">
									<div class="card-header">
										<h5>Informacion Alumno</h5>
									</div>
									<div class="card-block">
										<form id="FormAlumnoEdit" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" class="id_useralumno" hidden value="{{Auth()->User()->id}}">
											<div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">RUT</label>
													<div class="col-sm-9">
                                                        <input type="text" class="form-control" readonly value="{{$alumno->rut}}" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Nombres</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" readonly value="{{$alumno->nombres}}" disabled>
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Apellidos</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" readonly value="{{$alumno->apellidos}}" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Correo Electronico</label>
													<div class="col-sm-9">
                                                        <input type="email" name="correo" class="form-control" value="{{$alumno->email}}" required>
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Celular</label>												
													<div class="input-group col-sm-9 input-group-default">
	                                                    <span class="input-group-prepend"><label class="input-group-text">+56 9</label></span>
	                                                    <input type="text" name="celular" class="form-control" maxlength="8" value="{{$alumno->celular}}">
	                                                </div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-update">
													<button class="btn btn-primary btn-round btn-register" type="submit"><i class="feather icon-save"></i> Actualizar Información </button>
												</div>
											</div>										
										</form>
									</div>
								</div>
								
								<div class="card inscripcion">
									<div class="card-header">
										<h5>Solitud Alumno</h5>
									</div>
									<div class="card-block">
										<form id="SendSolicitudAlumno" method="POST">
                                            @csrf
                                            <input type="number" class="id_useralumno" hidden value="{{Auth()->User()->id}}">
											<div class="row">
												<div class="form-group col-lg-12 col-12 row">
													<label class="col-sm-2 col-form-label">Motivo</label>
													<div class="col-sm-10">
                                                        <input type="text" name="motivo" class="form-control" required>
													</div>
												</div>
											</div>											
											<div class="row">
												<div class="form-group col-lg-12 col-12 row">
													<label class="col-sm-2 col-form-label">Descripción</label>
													<div class="col-sm-10">
                                                        <textarea name="mensaje" cols="10" rows="10" class="form-control" required></textarea>
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-solicitud">
													<button class="btn btn-success btn-round btn-register" type="submit"><i class="feather icon-mail"></i> Enviar solicitud</button>
												</div>
											</div>										
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('backend.pages.alumno.modal')
@endsection	

@section('js')
	<script type="text/javascript" src="{{asset('backend/js/system/ajax-alumno-home.js')}}"></script>	
@endsection