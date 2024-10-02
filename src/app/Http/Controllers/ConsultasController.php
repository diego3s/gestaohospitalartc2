<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $consultas = Consulta::all();
        return view('Consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $medicos = Medico::all();
        $pacientes = Paciente::all();

        return view('Consultas.create', compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $paciente = Paciente::find($request->input('consulta.paciente_id'));
        $medico = Medico::find($request->input('consulta.medico_id'));
        $consulta = new Consulta;
        $consulta->fill($request->input('consulta'));
        $consulta->medico()->associate($medico);
        $consulta->paciente()->associate($paciente);
        $consulta->save();

        return redirect()->route('consultas.index')->with('sucess', 'Consulta Registrada');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $consulta = Consulta::findOrFail($id);
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        return redirect()->route('consultas.index')->with('sucess', 'Consulta apagada');
    }
}
