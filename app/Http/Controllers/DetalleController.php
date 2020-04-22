<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class DetalleController extends Controller
{

    public function listar()
    {
        $detalles = App\Detalle::orderby('descripcion', 'asc')->get();
        return response()->json([
            $detalles
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = App\Detalle::orderby('descripcion', 'asc')->get();
        $laboratorios = App\Laboratorio::orderby('nombre', 'asc')->get();
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();       
        return view('detalle.index', compact('detalles', 'laboratorios', 'hospitales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-detalle'))
        {
            return redirect()->route('detalle.index');
        }
        $laboratorios = App\Laboratorio::orderby('nombre', 'asc')->get();
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        return view('detalle.create', compact('hospitales', 'laboratorios'));
        //return view('detalle.insert', compact('hospitales', 'laboratorios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            App\Detalle::create($request->all());
            return response()->json([
                'mensaje' => 'Creado'
            ]);
        }

        /*$request->validate([
            'descripcion' => 'required',
            'fecha' => 'required',
            'idlaboratorio' => 'required',
            'idhospital' => 'required'
        ]);

        App\Detalle::create($request->all());      
        
        return redirect()->route('detalle.index')
                ->with('exito', 'se ha creado el detalle correctamente');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = App\Detalle::join('laboratorios', 'detalles.idlaboratorio', '=', 'laboratorios.id')
                                ->join('hospitals', 'detalles.idhospital', '=', 'hospitals.id')
                                ->select('detalles.*', 'laboratorios.nombre as laboratorio', 'hospitals.nombre as hospital')
                                ->where('detalles.id', $id)
                                ->first(); 
        return view('detalle.view', compact('detalle'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-detalle'))
        {
            return redirect()->route('detalle.index');
        }

        $laboratorios = App\Laboratorio::orderby('nombre', 'asc')->get();
        $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
        $detalle = App\Detalle::findorfail($id);

        return response()->json([
            $detalle
        ]);

        //return view('detalle.edit', compact('detalle', 'laboratorios', 'hospitales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required',
            'idlaboratorio' => 'required',
            'idhospital' => 'required'            
        ]);
        
        $detalle = App\Detalle::findorfail($id);

        $detalle->update($request->all());

        return response()->json([
            "mensaje" => "modificado"
        ]);

        /*return redirect()->route('detalle.index')
                ->with('exito', 'se ha modificado el detalle correctamente');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-detalle'))
        {
            return redirect()->route('detalle.index');
        }

        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.index')
                ->with('exito', 'se ha eliminado el detalle correctamente');
    }
}
