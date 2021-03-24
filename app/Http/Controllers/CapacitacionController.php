<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Capacitacion\CapacitacionRequest;
use App\Capacitacion;
use App\Certificado;
use App\Modalidad;

class CapacitacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $modalidades = Modalidad::all();
        return view('backend.pages.capacitacion.index', compact('modalidades'));
    }

    public function getDelete()
    {   
        $capacitaciones = Capacitacion::onlyTrashed()->get();

        return datatables()->of($capacitaciones)
            ->addColumn('tipo', function($data){ return $data->TipoCapacitacion->tipo;})
            ->addColumn('btn', 'backend.pages.capacitacion.acciones_delete')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function  capacitacionReactivar($id)
    {
        Capacitacion::withTrashed()
                ->where('id', $id)
                ->restore();
        return response()->json("Capacitacion activada exitosamente");
    }

    public function store(CapacitacionRequest $request)
    {   
        $cod_last = Capacitacion::select(['codigo'])->get()->last();
        $codigo = 100;
        if(!empty($cod_last)){
            $codigo = $cod_last->codigo+1;
        }
        Capacitacion::create(['codigo' => $codigo, 'nombre' => mb_strtoupper($request->titulo), 'hr_pedagogicas' => $request->hr_pedagogicas, 'tipo_capacitacion_id' => $request->tipo, 'modalidad_id' => $request->modalidad]);
        return response()->json("Capacitación añadida exitosamente.");
    }

    public function edit($id)
    {
        $capacitacion = Capacitacion::where(['id' => $id])->first();
        return response()->json($capacitacion);
    }
   
    public function update(CapacitacionRequest $request, $id)
    {   
        Capacitacion::updateOrCreate(['id' => $id],['nombre' => mb_strtoupper($request->titulo), 'hr_pedagogicas' => $request->hr_pedagogicas, 'tipo_capacitacion_id' => $request->tipo, 'modalidad_id' => $request->modalidad]);
        return response()->json('Capacitación actualizada exitosamente.');
    }

    public function CertificadoView($id)
    {   
        $certificados = Certificado::where('capacitacion_id', $id)->get();

        return datatables()->of($certificados)
            ->addColumn('alumno', function($data){ return $data->Alumno->nombres.' '.$data->Alumno->apellidos;})
            ->addColumn('capacitacion', function($data){ return $data->Capacitacion->nombre;})
            ->addColumn('notas', function($data){ return substr($data->nota,0,1).'.'.substr($data->nota,-1,1);})
            ->addColumn('btn', 'backend.pages.capacitacion.accion_sub')
            ->rawColumns(['btn']) 
            ->toJson();
    }

    public function CheckCertificados($id)
    {   
        $certificados = Capacitacion::find($id);
        $certificados->Certificado;
        return response()->json(count($certificados->certificado));
    }

    public function destroy($id)
    {   
        Capacitacion::destroy($id);
        return response()->json("Capacitación dada de baja exitosamente. Puedes reactivar esta capacitación en 'Desactivados'");
    }

    public function destroyForce($id)
    {   
        $delete = Capacitacion::find($id);
        $delete->forceDelete();
        return response()->json("Capacitación a sido eliminada completamente.");
    }
}
