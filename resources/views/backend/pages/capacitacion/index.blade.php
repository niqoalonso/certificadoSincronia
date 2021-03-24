@extends('layouts.backend.backend')

@section('content')
		<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-users bg-c-blue"></i>
						<div class="d-inline">
							<h5>Gestión Capacitación</h5>
							<span>Administra información de capacitaciones certificadas.</span>
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
									<div class="card-header row">
										<div class="col-lg-10 col-8">
											<h5>Nueva Capacitación</h5>
										</div>
										<div class="col-lg-2 col-4">
											<button type="button" onclick="ViewCapacitacionDelete()" class="btn btn-sm btn-outline-warning btn-block"><i class="fa fa-trash"></i>Desactivados</button>
										</div>										
									</div>
									<div class="card-block">
										<form id="FormCapacitacion" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-lg-6  col-12 row">
                                                    <label class="col-sm-3 col-form-label">Tipo</label>
                                                    <div class="col-sm-9 row">
                                                        <div class="form-radio">                                                     
                                                            <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="tipo" value="1" required>
                                                                <i class="helper"></i>Curso
                                                            </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="tipo" value="2" required>
                                                                <i class="helper"></i>Diplomado
                                                            </label>
                                                            </div>  
                                                            <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="tipo" value="3" required>
                                                                <i class="helper"></i>Postítulo
                                                            </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Modalidad</label>
													<select name="modalidad" class="js-example-basic-single col-sm-9" required>
														<option value="">Seleccionar</option>
														@foreach($modalidades as $modalidad)
														<option value="{{$modalidad->id_modalidad}}">{{$modalidad->nombre}}</option>
														@endforeach
                                                    </select>
                                                </div>
                                            </div>
											<div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Titulo</label>
													<div class="col-sm-9">
														<input type="text" name="titulo" class="form-control" maxlength="150" required>
													</div>
                                                </div>
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Hr. Pedagogicas</label>
													<div class="col-sm-9">
														<input type="number" name="hr_pedagogicas" class="form-control" required>
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-ingreso">
													<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Registrar</button>
												</div>
											</div>										
										</form>
									</div>
                                </div>
                                
								<div class="card edicion" style="display: none">
									<div class="card-header row">
										<div class="col-lg-4">
											<h5>Edición Capacitación</h5>
										</div>
										<div class="col-lg-8">
											<h5 style="color: red"><b>LA EDICIÓN DE ESTA INFORMACION GENERARA CAMBIOS EN TODOS LOS CERTIFICADOS.</b></h5>
										</div>										
									</div>
									<div class="card-block">
										<form id="FormCapacitacionEdit" method="POST">
											@csrf
											@method('PUT')
											<input type="number" class="id" hidden name="id">
                                            <div class="row">
                                                <div class="form-group col-lg-6  col-12 row">
                                                    <label class="col-sm-3 col-form-label">Tipo</label>
                                                    <div class="col-sm-9 row">
                                                        <div class="form-radio">                                                     
                                                            <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" class="curso" name="tipo" value="1">
                                                                <i class="helper"></i>Curso
                                                            </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" class="diplomado" name="tipo" value="2">
                                                                <i class="helper"></i>Diplomado
                                                            </label>
                                                            </div>
															<div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" class="postitulo" name="tipo" value="3">
                                                                <i class="helper"></i>Postítulo
                                                            </label>
                                                            </div>                                                     
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Modalidad</label>
													<select name="modalidad" class="js-example-basic-single col-sm-9 modalidad">
														<option value="">Seleccionar</option>
														@foreach($modalidades as $modalidad)
														<option value="{{$modalidad->id_modalidad}}">{{$modalidad->nombre}}</option>
														@endforeach
                                                    </select>
                                                </div>
                                            </div>
											<div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Titulo</label>
													<div class="col-sm-9">
														<input type="text" name="titulo" class="form-control titulo">
													</div>
                                                </div>
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Hr. Pedagogicas</label>
													<div class="col-sm-9">
														<input type="number" name="hr_pedagogicas" class="form-control hr_pedagogicas">
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12 text-right btn-update">
													<button class="btn btn-danger btn-round" onclick="CancelarEdicionCapacitacion()" type="button"><i class="feather icon-close"></i> Cancelar</button>													
													<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Actualizar</button>
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
											<table id="Capacitaciones"  class="table table-sm">
												<thead>
                                                    <tr>
                                                        <th>CODIGO</th>
                                                        <th>TIPO</th>
                                                        <th>TITULO</th>
                                                        <th>HR PEDAGOGICAS</th>
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

		@include('backend.pages.capacitacion.modal')

@endsection	

@section('js')

	<script type="text/javascript" src="{{asset('backend/js/system/datatable-capacitacion.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/system/ajax-capacitacion.js')}}"></script>
	
@endsection