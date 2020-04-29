<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class FechadiaController extends Controller
{

    /*public function listar()
    {
        $fechadias = App\Fechadia::orderby('fecha', 'asc')->get();
        return response()->json([
            $fechadias
        ]);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechadias = App\Fechadia::orderby('fecha', 'asc')->get();
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();        
        return view('fechadia.index', compact('fechadias', 'diagnosticos', 'pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-fechadia'))
        {
            return redirect()->route('fechadia.index');
        }
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        //return view('fechadia.create', compact('diagnosticos', 'pacientes'));
        return view('fechadia.insert', compact('diagnosticos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*if($request->ajax()){
            App\Fechadia::create($request->all());
            return response()->json([
                'mensaje' => 'Creado'
            ]);
        }*/

        $request->validate([
            'fecha' => 'required',
            'iddiagnostico' => 'required',
            'idpaciente' => 'required'
        ]);

        App\Fechadia::create($request->all());      
        
        return redirect()->route('fechadia.index')
                ->with('exito', 'se ha creado la fecha de diagonostico correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fechadia  $fechadia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fechadia = App\Fechadia::join('diagnosticos', 'fechadias.iddiagnostico', 'diagnosticos.id')
                                ->join('pacientes', 'fechadias.idpaciente', 'pacientes.id')
                                ->select('fechadias.*', 'diagnosticos.tipo as diagnostico', 'pacientes.nombre as paciente')
                                ->where('fechadias.id', $id)
                                ->first();        
        return view('fechadia.view', compact('fechadia'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fechadia  $fechadia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-fechadia'))
        {
            return redirect()->route('fechadia.index');
        }

        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        $pacientes = App\Paciente::orderby('nombre', 'asc')->get();
        $fechadia = App\Fechadia::findorfail($id);

        /*return response()->json([
            $fechadia
        ]);*/

        return view('fechadia.edit', compact('fechadia', 'diagnosticos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fechadia  $fechadia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required',
            'iddiagnostico' => 'required',
            'idpaciente' => 'required'            
        ]);
        
        $fechadia = App\Fechadia::findorfail($id);

        $fechadia->update($request->all());

        /*return response()->json([
            "mensaje" => "modificado"
        ]);*/

        return redirect()->route('fechadia.index')
                ->with('exito', 'se ha modificado la fecha del diagnostico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fechadia  $fechadia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-fechadia'))
        {
            return redirect()->route('fechadia.index');
        }

        $fechadia = App\Fechadia::findorfail($id);

        $fechadia->delete();

        return redirect()->route('fechadia.index')
                ->with('exito', 'se ha eliminado la fecha del diagnostico correctamente');
    }
}
