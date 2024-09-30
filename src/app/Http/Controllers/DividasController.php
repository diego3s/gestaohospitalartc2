<?php

namespace App\Http\Controllers;

use App\Models\Divida;
use Illuminate\Http\Request;

class DividasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dividas = Divida::all();
        return view('Dividas.index', compact('dividas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dividas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $divida = new Divida;
        $divida->fill($request->input('divida'));
        $divida->save();

        return redirect()->route('dividas.index')->with('success', 'Dívida lançada no sistema');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divida $divida)
    {
        return view('Dividas.show', compact('divida'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $divida = Divida::findOrFail($id);
        return view('Dividas.edit', compact('divida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divida $divida)
    {
        $divida->update($request->input('divida'));
        return redirect()->route('dividas.index')->with('success', 'Divida atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $divida = Divida::findOrFail($id);
        $divida->delete();
        return redirect()->route('dividas.index')->with('success', 'Registro deletado');
    }
}
