<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('alumno', function(){

    $alumnos = App\Alumno::whereHas('roles', function($q){
        $q->where('slug','!=', 'useradmin');
    })->get();

    return datatables()->of($alumnos)
        ->addColumn('nameFull', function($data){ return $data->nombres.' '.$data->apellidos; })
        ->addColumn('celular', function($data){ return '+56 9 '.$data->celular; })
        ->addColumn('btn', 'backend.pages.alumno.acciones')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('capacitacion', function(){

    $capacitaciones = App\Capacitacion::query();

    return datatables()->of($capacitaciones)
        ->addColumn('tipo', function($data){ return $data->TipoCapacitacion->tipo;})
        ->addColumn('btn', 'backend.pages.capacitacion.acciones')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('certificado', function(){

    $certificados = App\Certificado::query();

    return datatables()->of($certificados)
        ->addColumn('alumno', function($data){ return $data->Alumno->nombres.' '.$data->Alumno->apellidos;})
        ->addColumn('capacitacion', function($data){ return $data->Capacitacion->nombre;})
        ->addColumn('notas', function($data){ return substr($data->nota,0,1).'.'.substr($data->nota,-1,1);})
        ->addColumn('btn', 'backend.pages.certificado.acciones')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('solicitud', function(){

    $certificados = App\SolicitudCertificado::query();

    return datatables()->of($certificados)
        ->addColumn('certificado', function($data){ return $data->Certificado->codigo_cert;})
        ->addColumn('btn', 'backend.pages.solicitud.acciones')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('certificadoAlumno/{id}', function($id){

    $certificados = App\Certificado::where('alumno_id', $id)->get();

    return datatables()->of($certificados)
        ->addColumn('alumno', function($data){ return $data->Alumno->nombres.' '.$data->Alumno->apellidos;})
        ->addColumn('capacitacion', function($data){ return $data->Capacitacion->nombre;})
        ->addColumn('notas', function($data){ return substr($data->nota,0,1).'.'.substr($data->nota,-1,1);})
        ->addColumn('btn', 'backend.pages.home.acciones')
        ->rawColumns(['btn'])
        ->toJson();
});
