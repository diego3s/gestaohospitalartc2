<?php
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::with('user')->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->input('usuario'));
        $user->save();

        $funcionario = new Funcionario;
        $funcionario->fill($request->input('funcionario'));

        $funcionario->user()->associate($user);
        $funcionario->save();        

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
      */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $funcionario->update($request->input('funcionario'));
        $funcionario->user->update($request->input('usuario'));
        


        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        //dd($funcionario);
        $funcionario->delete(); //  deleta tanto o usuário quanto o funcionário devido ao 'onDelete(cascade)'
        
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }
}
