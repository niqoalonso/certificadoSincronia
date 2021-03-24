@extends('layouts.frontend.frontend')

@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1>CERTIFICACIÓN</h1>
      <h2>Obtén información sobre nuestros certificados emitidos en SINCRONÍA.</h2>
      <small><p style="color: #fff" ><b> OTEC </b> para organizaciones que aprenden</p></small>
      <a href="{{route('certificacion')}}" class="btn-about">Consultar</a>
    </div>
  </section>

@endsection