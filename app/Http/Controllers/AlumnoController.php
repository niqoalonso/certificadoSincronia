<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Alumno\AlumnoRequest;
use App\Http\Requests\Alumno\UserAlumnoRequest;
use App\Alumno;
use App\Certificado;
use DB;
use App\Mail\SendCredencialAlumno;
use Mail;

class AlumnoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) 
    {   
        $alumnos = Alumno::whereHas('roles', function($q){
            $q->where('slug','!=', 'useradmin');
        })->get();
        if($request->Ajax()){
            return response()->json($alumnos);
        }else{
            return view('backend.pages.alumno.index', compact('alumnos'));
        }
    }

    public function alumnoComprobarEliminado($rut)
    {
        $alumno = Alumno::where('rut', $rut)->onlyTrashed()->first();
        if(!empty($alumno)){
            $valor = $alumno->id;
        }else{
            $valor = 0;
        }
        return response()->json($valor);
    }

    public function AlumnoController($id)
    {
        Alumno::withTrashed()
                ->where('id', $id)
                ->restore();
        return response()->json("Alumno activado exitosamente");
    }
   
    public function store(AlumnoRequest $request)
    {   
        $alumno = Alumno::create(['rut' => $request->rut, 'email' => mb_strtolower($request->correo), 'celular' => $request->celular, 'nombres' => ucwords(mb_strtolower($request->nombres)), 'apellidos' => ucwords(mb_strtolower($request->apellidos)), 'password' => Hash::make('alumn.'.substr($request->rut, 0, 4))]);
        DB::table('alumno_role')->insert(['role_id'=>2,'alumno_id'=>$alumno->id]);
        $pass = 'alumn.'.substr($request->rut, 0, 4);
        Mail::to($alumno->email)->send(new SendCredencialAlumno($alumno, $pass));
        return response()->json("Nuevo alumno ingresado exitosamente!!");
    }

    public function edit($id)
    {
        $alumno = Alumno::where('id', $id)->first();
        return response()->json($alumno);
    }

    public function update(AlumnoRequest $request, $id)
    {   
        Alumno::updateOrCreate(['id' => $id],['rut' => $request->rut,'email' => mb_strtolower($request->correo), 'celular' => $request->celular, 'nombres' => ucwords(mb_strtolower($request->nombres)), 'apellidos' => ucwords(mb_strtolower($request->apellidos))]);
        return response()->json("Alumno ha sido actualizado exitosamente");
    }

    public function UpdateAlumnoUser(UserAlumnoRequest $request, $id)
    {   
        Alumno::updateOrCreate(['id' => $id],['email' => mb_strtolower($request->correo), 'celular' => $request->celular]);
        return response()->json("Tu información ha sido actializada exitosamente.");
    }

    public function CertificadoViewAlumno($id)
    {
        $certificados = Certificado::where('alumno_id', $id)->get();

        return datatables()->of($certificados)
            ->addColumn('alumno', function($data){ return $data->Alumno->nombres.' '.$data->Alumno->apellidos;})
            ->addColumn('capacitacion', function($data){ return $data->Capacitacion->nombre;})
            ->addColumn('notas', function($data){ return substr($data->nota,0,1).'.'.substr($data->nota,-1,1);})
            ->addColumn('btn', 'backend.pages.alumno.accion_sub')
            ->rawColumns(['btn']) 
            ->toJson();
    }

    public function CheckCertificadosAlumnos($id)
    {
        $alumnos = Alumno::find($id);
        $alumnos->Certificado;
        return response()->json(count($alumnos->certificado));
    }

    public function destroy($id)
    {
        Alumno::destroy($id);
        return response()->json("Alumno dada de baja exitosamente. Puedes reactivar este alumno en 'Desactivados'");
    }

    public function destroyForce($id)
    {
        $delete = Alumno::find($id);
        $delete->forceDelete();
        return response()->json("Alumno a sido eliminada completamente.");
    }
}
