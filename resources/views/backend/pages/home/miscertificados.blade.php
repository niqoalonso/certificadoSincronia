@extends('layouts.backend.backend')

@section('content')
		<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-users bg-c-blue"></i>
						<div class="d-inline">
							<h5>Mis Certificados</h5>
							<span>Revisa tus certificados y descargalos.</span>
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
								
								<div class="card">
									<div class="card-header">
										<h5>Certificados</h5>																				
                                        <input type="text" hidden class="id_alumno" value="{{Auth()->user()->id}}">	
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

@endsection	

@section('js')

	<script type="text/javascript" src="{{asset('backend/js/system/datatable-certificadoalumno.js')}}"></script>
	
@endsection