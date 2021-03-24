@extends('layouts.frontend.frontend')

@section('content')
<main id="main">


    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">
  
            <div class="section-title">
                <h2>CERTIFICADOS</h2>
                <b><em>Resultado de busqueda mediante codigo QR encontrada</em></b>
            </div>
  
            <div class="row body-certificado">           
                <div class="col-lg-6 offset-lg-4">              
                    <div class="resume-item">
                    <em>Profesional: {{$certificado->Alumno->nombres}} {{$certificado->Alumno->apellidos}}</em><br>
                    <p>
                        <h4>{{$certificado->Capacitacion->nombre}}
                            <a href=""> 
                                <button type="button" onclick="SolicitudCertificado(this.id, this.value)" id="{{$certificado->id}}" value="{{$certificado->codigo_cert}}" class="btn btn-certificado btn-xs"><i class="bx bx-send"></i> Solicitar Certificado</button>
                            </a>
                        </h4>
                    </p>
                    <em>Nota: {{$certificado->nota}}</em>
                    <br>
                    <em>Tipo: {{$certificado->Capacitacion->TipoCapacitacion->tipo}}</em>
                    
                    <br>
                    <em>Identificador: <b>{{$certificado->codigo_cert}}</b></em>
                    <br>
                    <em>Realizado: </em><h5>{{$certificado->fecha_inicio}} / {{$certificado->fecha_termino}}</h5>
                    <br>
                    @if(!empty($certificado->vigencia))
                        <em>Vigente:</em><h5>{{$certificado->vigencia}}</h5>
                    @else
                        <em>Vigente:</em><h5>Vitalicio</h5>
                    @endif
                    
                    </div>                    
                </div>
            </div>     
      
        </div>
        <hr>
      </section>

      <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">
  
            <div class="section-title">
                <h2>¿BUSCAS ALGO MÁS?</h2>
            </div>
  
            <div class="row">           
                <div class="col-lg-6">              
                    <div class="resume-item">
                        <p><em>Necesitas buscar resultado de mas certificados vigente en nuestra plataforma. Puedes hacerlo haciendo clic en el siguiente boton.</em></p>
                        <a href="{{route('certificacion')}}"><button type="button" class="btn btn-success btn-sm"><i class="bx bx-send"></i> Buscar Certificados</button></a>
                    </div>                    
                </div>
                <br> 
                <div class="col-lg-6">              
                    <div class="resume-item">
                        <p><em>Necesitas ayuda de nuestro equipo sobre alguna certificado o solicitar alguna otro tipo de servicios. Puedes contactarnos en el siguiente boton.</em></p>
                        <a href="{{route('contactenos')}}"><button type="button" class="btn btn-success btn-sm" ><i class="bx bx-send"></i> Buscar Certificados</button></a>
                    </div>                    
                </div>
            </div>            
      
        </div>
        
      </section>

  </main>

<div class="modal fade" id="ModalSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 0px;">
  <div class="modal-dialog" role="document" style="border-radius: 0px;">
    <div class="modal-content" style="border-radius: 0px;">
      <div class="modal-header" style="border-radius: 0px;">
        <h5 class="modal-title" id="exampleModalLabel"><em>Solicitud Certificado</em> - <b class="codigo_header"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormSolicitudCertificado" method="POST">
        @csrf
        <input type="text" name="codigo" class="codigo_id" hidden>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control form-control-sm" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="">Empresa - Institución</label>
            <input type="text" name="empresa" class="form-control form-control-sm" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="">Correo Electronico</label>
            <input type="email" name="email" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <label for="">Mensaje (opcional)</label>
            <input type="text" name="mensaje" class="form-control form-control-sm" maxlength="250">
          </div>
        </div>      
        <div class="modal-footer btn-enviar">
          <button type="submit" class="btn btn-certificado btn-ts"><i class="bx bx-send"></i> Solicitar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
    <script src="{{asset('frontend/js/ajax-certificado.js')}}" type="text/javascript"></script>
@endsection