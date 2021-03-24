@extends('layouts.backend.backend')

@section('content')
<div class="page-header card">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="feather icon-home bg-c-blue"></i>
						<div class="d-inline">
							<h5>Bienvenido.</h5>
							<span>Plataforma Certificado SINCRONÍA.</span>
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

		<div class="col-xl-3 col-md-6">
			<div class="card prod-p-card card-red">
			<div class="card-body">
			<div class="row align-items-center m-b-30">
			<div class="col">
			<h6 class="m-b-5 text-white">Certificados</h6>
			<h3 class="m-b-0 f-w-700 text-white">{{$certificados}}</h3>
			</div>
			<div class="col-auto">
			<i class="fas fa-money-bill-alt text-c-red f-18"></i>
			</div>
			</div>
			</div>
			</div>
		</div>
		@if(Auth()->user()->hasRole('useradmin'))
		<div class="col-xl-3 col-md-6">
			<div class="card prod-p-card card-blue">
			<div class="card-body">
			<div class="row align-items-center m-b-30">
			<div class="col">
			<h6 class="m-b-5 text-white">Alumnos</h6>
			<h3 class="m-b-0 f-w-700 text-white">{{$alumnos}}</h3>
			</div>
			<div class="col-auto">
			<i class="fas fa-users text-c-blue f-18"></i>
			</div>
			</div>
			</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card prod-p-card card-yellow">
			<div class="card-body">
			<div class="row align-items-center m-b-30">
			<div class="col">
			<h6 class="m-b-5 text-white">Solicitudes</h6>
			<h3 class="m-b-0 f-w-700 text-white">{{$solicitudes}}</h3>
			</div>
			<div class="col-auto">
			<i class="fas fa-envelope text-c-yellow f-18"></i>
			</div>
			</div>
			</div>
			</div>
		</div>
		@endif
		{{-- <div class="col-xl-3 col-md-6">
			<div class="card prod-p-card card-green">
			<div class="card-body">
			<div class="row align-items-center m-b-30">
			<div class="col">
			<h6 class="m-b-5 text-white">Average Price</h6>
			<h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
			</div>
			<div class="col-auto">
			<i class="fas fa-dollar-sign text-c-green f-18"></i>
			</div>
			</div>
			<p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
			</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card prod-p-card card-yellow">
			<div class="card-body">
			<div class="row align-items-center m-b-30">
			<div class="col">
			<h6 class="m-b-5 text-white">Product Sold</h6>
			<h3 class="m-b-0 f-w-700 text-white">6,784</h3>
			</div>
			<div class="col-auto">
			<i class="fas fa-tags text-c-yellow f-18"></i>
			</div>
			</div>
			<p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
			</div>
			</div>
		</div> --}}


		</div>

		</div>
		</div>
		</div>
		</div>
@endsection