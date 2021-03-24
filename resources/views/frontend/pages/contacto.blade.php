@extends('layouts.frontend.frontend')

@section('content')
<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contáctenos</h2>
          <p>Comunicate con nosotros si deseas mayor asesoría o inquietudes sobre nuestra OTEC SINCRONÍA.</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Dirección:</h4>
                <p>Gobernador Juan Henriquez N° 1194, Lomas de San Andrés, Concepcion.</p>
              </div>
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Correo Electronico:</h4>
                <p>contacto@sincronialtda.cl</p>
              </div>
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Teléfono:</h4>
                <p>+(41) 2463 192</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <form id="FormSendMail" method="POST" role="form" class="php-email-form">
              @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nombre" class="form-control" id="name" placeholder="Nombre completo" maxlength="100" required  />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" required  />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="motivo" id="subject" placeholder="Motivo" maxlength="100" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="mensaje" rows="5" placeholder="Mensaje" maxlength="400" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center btn-enviar">
                <button type="submit" class="buttonload btn btn-certificado"><i class="bx bx-send"></i> Enviar</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>

  </main>

@endsection

@section('js')
    <script src="{{asset('frontend/js/ajax-contacto.js')}}" type="text/javascript"></script> 
@endsection