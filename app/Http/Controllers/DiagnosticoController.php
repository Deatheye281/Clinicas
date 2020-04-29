<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    
    /*public function listar()
    {
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        return response()->json([
            $diagnosticos
        ]);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosticos = App\Diagnostico::orderby('tipo', 'asc')->get();
        return view('diagnostico.index', compact('diagnosticos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear-diagnostico'))
        {
            return redirect()->route('diagnostico.index');
        }
        //return view('diagnostico.create');
        return view('diagnostico.insert');
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
            App\Diagnostico::create($request->all());
            return response()->json([
                'mensaje' => 'Creado'
            ]);
        }*/
        $request->validate([
            'tipo' => 'required',
            'complicacion' => 'required'
        ]);

        App\Diagnostico::create($request->all());      
        
        return redirect()->route('diagnostico.index')
                ->with('exito', 'se ha creado el diagnostico correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnostico = App\Diagnostico::findorfail($id);
        
        return view('diagnostico.view', compact('diagnostico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-diagnostico'))
        {
            return redirect()->route('diagnostico.index');
        }
        $diagnostico = App\Diagnostico::findorfail($id);

        /*return response()->json([
            $diagnostico
        ]);*/

        return view('diagnostico.edit', compact('diagnostico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
            'complicacion' => 'required'
        ]);
        
        $diagnostico = App\Diagnostico::findorfail($id);

        $diagnostico->update($request->all());

        /*return response()->json([
            "mensaje" => "modificado"
        ]);*/

        return redirect()->route('diagnostico.index')
                ->with('exito', 'se ha modificado el diagnostico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar-diagnostico'))
        {
            return redirect()->route('diagnostico.index');
        }

        $diagnostico = App\Diagnostico::findorfail($id);

        $diagnostico->delete();

        return redirect()->route('diagnostico.index')
                ->with('exito', 'se ha eliminado el diagnostico correctamente');
    }
}
