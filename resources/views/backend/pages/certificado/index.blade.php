@extends('layouts.backend.backend')

@section('content')
		<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-users bg-c-blue"></i>
						<div class="d-inline">
							<h5>Gestión Certificados</h5>
							<span>Administra la creación de certificados y otras funciones.</span>
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
										<h5>Nuevo Certificado</h5> - 
									</div>
									<div class="card-block">
										<form id="FormCertificado" method="POST">
											@csrf								
											<div class="row">
												<div class="form-group col-lg-12 col-12 row">
													<label class="col-sm-2 col-form-label">Capacitacion</label>
													<select name="capacitacion" class="js-example-basic-single col-sm-10" onchange="ChangeCertificadoNuevo(this.value)" required>
                                                            <option value="">Seleccionar</option>
                                                        @foreach($capacitaciones as $capacitacion)
                                                            <option value="{{$capacitacion->id}}">({{substr($capacitacion->TipoCapacitacion->tipo, 0, 1)}}) - {{$capacitacion->nombre}}({{$capacitacion->hr_pedagogicas}}) - {{$capacitacion->Modalidad->nombre}} </option>
                                                        @endforeach
                                                    </select>
												</div>												
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Alumno</label>
													<select name="alumno" class="js-example-basic-single col-sm-9" required>
														<option value="">Seleccionar</option>
														@foreach($alumnos as $alumno)
															<option value="{{$alumno->id}}">{{$alumno->nombres}} {{$alumno->apellidos}}</option>
														@endforeach
                                                    </select>
                                                </div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Asistencia</label>
													<div class="col-sm-9">
														<div class="input-group">
                                                            <input name="asistencia" type="text" class="form-control" maxlength="3" required>
                                                            <span class="input-group-append">
                                                                <label class="input-group-text"><i class="fa fa-percent"></i></label>
                                                            </span>
                                                        </div>
													</div>
                                                </div>
											</div>
                                            <hr>
                                            <div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">F. inicio</label>
                                                    <div class="col-9">
                                                        <input name="f_inicio" class="form-control fill col-12" type="date" required>
                                                    </div>                                                    
                                                </div>
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">F. termino</label>
													<div class="col-9">
                                                        <input name="f_termino" class="form-control fill col-12" type="date" required>
                                                    </div>
												</div>
                                            </div>
                                            <div class="row">												
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Nota</label>
													<div class="col-sm-9">
														<div class="input-group">
                                                            <input name="nota" type="text" onkeypress="ChangeCaracter(this.value)" class="form-control" maxlength="5" required>
                                                            <span class="input-group-append">
                                                                <label class="input-group-text"><i class="fa fa-percent"></i></label>
                                                            </span>
                                                        </div>
													</div>
                                                </div>
                                                <div class="form-group col-lg-6 col-12 row vigencia" style="display: none">                                                    
                                                </div>
											</div>
											<div class="row">
												<div class="col-3">
													<p>	<small><b>(C)</b> Cursos <b>(D)</b> Diplomado <b>(P)</b> Postítulo</small></p>
												</div>
												<div class="col-9 text-right btn-ingreso">
                                                    <button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Crear Certificado</button>                                
												</div>
											</div>										
										</form>
									</div>
								</div>
								

								<div class="card edicion"  style="display: none">
									<div class="card-header row">
										<div class="col-12 col-lg-7">
											<h5>Edición Certificado</h5>
										</div>
										<div class="col-12 col-lg-3 codigo_header">

										</div>
										<div class="col-12 col-lg-2 nota_header">

										</div>										
									</div>
									<div class="card-block">
										<form id="FormCertificadoEdit" method="POST">
											@csrf
											@method('PUT')
											<input type="number" class="id" hidden name="id">
											<input type="number" class="id_tipo_capacitacion" hidden name="tipo">
											<div class="row">
												<div class="form-group col-lg-12 col-12 row">
													<label class="col-sm-2 col-form-label">Capacitacion</label>
													<select name="capacitacion" class="js-example-basic-single col-sm-10 capacitacion" onchange="ChangeCertficiadoEdit(this.value, this.id)" id="0">
                                                        <option value="">Seleccionar</option>
                                                        @foreach($capacitaciones as $capacitacion)
														<option value="{{$capacitacion->id}}">({{substr($capacitacion->TipoCapacitacion->tipo, 0, 1)}}) - {{$capacitacion->nombre}}({{$capacitacion->hr_pedagogicas}}) - {{$capacitacion->Modalidad->nombre}} </option>
                                                        @endforeach
                                                    </select>
												</div>
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">Alumno</label>
													<select name="alumno" class="js-example-basic-single col-sm-9 alumno">
														<option value="">Seleccionar</option>
														@foreach($alumnos as $alumno)
															<option value="{{$alumno->id}}">{{$alumno->nombres}} {{$alumno->apellidos}}</option>
														@endforeach
                                                    </select>
                                                </div>
												<div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Asistencia</label>
													<div class="col-sm-9">
														<div class="input-group">
                                                            <input name="asistencia" type="text" class="form-control asistencia" maxlength="3" required>
                                                            <span class="input-group-append">
                                                                <label class="input-group-text"><i class="fa fa-percent"></i></label>
                                                            </span>
                                                        </div>
													</div>
                                                </div>
											</div>
											
                                            <hr>
                                            <div class="row">
												<div class="form-group col-lg-6 col-12 row">
													<label class="col-sm-3 col-form-label">F. inicio</label>
                                                    <div class="col-9">
                                                        <input name="f_inicio" class="form-control fill col-12 f_inicio" type="date">
                                                    </div>                                                    
                                                </div>
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">F. termino</label>
													<div class="col-9">
                                                        <input name="f_termino" class="form-control fill col-12 f_termino" type="date">
                                                    </div>
												</div>
                                            </div>
                                            <div class="row">												
                                                <div class="form-group col-lg-6  col-12 row">
													<label class="col-sm-3 col-form-label">Nota</label>
													<div class="col-sm-9">
														<div class="input-group">
                                                            <input name="nota" type="text" class="form-control nota_porcentaje" onkeypress="ChangeCaracter(this.value)">
                                                            <span class="input-group-append">
                                                                <label class="input-group-text"><i class="fa fa-percent"></i></label>
                                                            </span>
                                                        </div>
													</div>
                                                </div>
												<div class="form-group col-lg-6 col-12 row edit_vigencia" style="display: none">     
													<label class="col-sm-3 col-form-label">Vigencia</label>
													<div class="col-9">
                                                        <input name="vigencia" class="form-control fill col-12 input_vigencia" type="date">
                                                    </div>                                               
                                                </div>
											</div>
											<div class="row">
												<div class="col-3">
													<p>	<small><b>(C)</b> Cursos <b>(D)</b> Diplomado <b>(P)</b> Postítulo</small></p>
												</div>
												<div class="col-9 text-right btn-update">
													<button class="btn btn-danger btn-round" onclick="CancelarEdicionCertificado()" type="button"><i class="feather icon-close"></i> Cancelar</button>													
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
											<table id="Certificado"  class="table table-sm">
												<thead>
                                                    <tr>
                                                        <th>CODIGO</th>
                                                        <th>ALUMNO</th>
                                                        <th>CAPACITACION</th>
                                                        <th>NOTA</th>
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

	@include('backend.pages.certificado.modal')

@endsection	

@section('js')

	<script type="text/javascript" src="{{asset('backend/js/system/datatable-certificado.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/system/ajax-certificado.js')}}"></script>
	
@endsection