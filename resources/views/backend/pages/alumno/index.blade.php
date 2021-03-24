@extends('layouts.backend.backend')

@section('content')
		<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-users bg-c-blue"></i>
						<div class="d-inline">
							<h5>Gestión Alumnos</h5>
							<span>Administra información de profesionales inscritos y sus certificados.</span>
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
										<h5>Nuevo Alumno</h5>
									</div>
									<div class="card-block">
										<form id="FormAlumno" method="POST">
											@csrf
											<div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">RUT</label>
													<div class="col-sm-9">
														<input type="text" id="input_usuario" name="rut" onkeyup="checkRut(this)" class="form-control" placeholder="111111111-1" required maxlength="10">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Nombres</label>
													<div class="col-sm-9">
														<input type="text" name="nombres" class="form-control nombres_new" disabled="" required maxlength="60">
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Apellidos</label>
													<div class="col-sm-9">
														<input type="text" name="apellidos" class="form-control apellidos_new" disabled="" required maxlength="60">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Correo Electronico</label>
													<div class="col-sm-9">
														<input type="email" name="correo" class="form-control correo_new" disabled="" required>
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Celular</label>												
													<div class="input-group col-sm-9 input-group-default">
	                                                    <span class="input-group-prepend"><label class="input-group-text">+56 9</label></span>
	                                                    <input type="text" name="celular" class="form-control celular_new" maxlength="8" disabled="">
	                                                </div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-ingreso">								
													<button class="btn btn-primary btn-round btn-register" type="submit" disabled=""><i class="feather icon-save"></i> Registrar</button>
												</div>
											</div>										
										</form>
									</div>
								</div>

								<div class="card edicion" style="display: none">
									<div class="card-header">
										<h5>Edición Alumno</h5>
									</div>
									<div class="card-block">
										<form id="FormAlumnoEdit" method="POST">
											@csrf
											@method('PUT')
											<input type="number" class="id" hidden name="id">
											<div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">RUT</label>
													<div class="col-sm-9">
														<input type="text" id="input_usuario" name="rut" onkeyup="checkRutEdit(this)" class="form-control rut" placeholder="111111111-1" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Nombres</label>
													<div class="col-sm-9">
														<input type="text" name="nombres" class="form-control nombres" required maxlength="60">
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Apellidos</label>
													<div class="col-sm-9">
														<input type="text" name="apellidos" class="form-control apellidos" required maxlength="60">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Correo Electronico</label>
													<div class="col-sm-9">
														<input type="email" name="correo" class="form-control correo" required>
													</div>
												</div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Celular</label>												
													<div class="input-group col-sm-9 input-group-default">
	                                                    <span class="input-group-prepend"><label class="input-group-text">+56 9</label></span>
	                                                    <input type="text" name="celular" class="form-control celular" maxlength="8">
	                                                </div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-update">
													<button class="btn btn-danger btn-round" onclick="CancelarEdicionAlumno()" type="submit"><i class="feather icon-close"></i> Cancelar</button>													
													<button class="btn btn-primary btn-round btn-edit" type="submit"><i class="feather icon-save"></i> Actualizar</button>
												</div>
											</div>										
										</form>
									</div>
								</div>

								<div class="card">
									<div class="card-header">
										<h5>Registros</h5>
										<div class="card-header-right">
											<ul class="list-unstyled card-option" style="width: 30px;">
											<li class="first-opt complete" style=""><i class="feather open-card-option icon-chevron-left"></i></li>
											<li><i class="feather icon-maximize full-card"></i></li>
											<li class=""><i class="feather minimize-card icon-minus"></i></li>
											<li><i class="feather icon-refresh-cw reload-card"></i></li>
											<li class="complete"><i class="feather open-card-option icon-chevron-left"></i></li>
											</ul>
											</div>
									</div>
									<div class="card-block">
										<div class="table-responsive">
											<table id="Alumnos"  class="table table-sm">
												<thead>
												<tr>
													<th>RUT</th>
													<th>NOMBRES / APELLIDO</th>
													<th>CORREO</th>
													<th>CELULAR</th>
													<th>&nbsp</th>												
												</tr>
												</thead>
												<tbody>														
												</tbody>
											</table>
										</div>
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

	<script type="text/javascript" src="{{asset('backend/js/system/datatable-alumnos.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/system/ajax-alumno.js')}}"></script> 
	<script type="text/javascript" src="{{asset('backend/js/system/valida-rut.js')}}"></script>
	
@endsection