<?php

namespace App\Http\Controllers;

use App\Models\APagar;
use Illuminate\Http\Request;

class APagarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagar = APagar::all();
        return view('Pagar.index', compact('pagar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Pagar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $p = new APagar;
        $p->fill($request->input('pagamento'));
        $p->save();

        return redirect()->route('pagar.index')->with('success', 'Pagamento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(APagar $pagar)
    {
        //
        return view('Pagar.show', compact('pagar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pagar = APagar::findOrFail($id);
        return view('Pagar.edit', compact('pagar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, APagar $pagar)
    {
        //
        $pagar->update($request->input('pagamento'));

        return redirect()->route('pagar.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pagar = APagar::findOrFail($id);
        $pagar->delete();

        return redirect()->route('pagar.index');
    }
}
