<?php

namespace App\Http\Controllers;

use App\Models\Cobranca;
use Illuminate\Http\Request;

class CobrancasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cobrancas = Cobranca::all();
        return view('Cobrancas.index', compact('cobrancas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cobrancas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cobranca = new Cobranca;
        $cobranca->fill($request->input('cobranca'));
        $cobranca->save();

        return redirect()->route('cobrancas.index')->with('success', 'Cobrança lançada no sistema');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cobranca $cobranca)
    {
        return view('Cobrancas.show', compact('cobranca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cobranca = Cobranca::findOrFail($id);
        return view('Cobrancas.edit', compact('cobranca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cobranca $cobranca)
    {
        $cobranca->update($request->input('cobranca'));
        return redirect()->route('cobrancas.index')->with('success', 'Cobrança atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cobranca = Cobranca::findOrFail($id);
        $cobranca->delete();
        return redirect()->route('cobrancas.index')->with('success', 'Registro deletado');
    }
}
