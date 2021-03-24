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
								
								<div class="card">
									<div class="card-header">
										<h5>Solicitudes</h5>																				
											
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
											<table id="Solicitud"  class="table table-sm">
												<thead>
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th>EMPRESA</th>
                                                        <th>CORREO</th>
                                                        <th>CERTIFICADO</th>                                                        
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

	@include('backend.pages.solicitud.modal')

@endsection	

@section('js')

	<script type="text/javascript" src="{{asset('backend/js/system/datatable-solicitud.js')}}"></script>
	<script type="text/javascript" src="{{asset('backend/js/system/ajax-solicitud.js')}}"></script>
	
@endsection