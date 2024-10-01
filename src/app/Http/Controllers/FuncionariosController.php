<?php
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Laboratorista;
use App\Models\Administrativo;
use App\Models\Medico;
use App\Models\Enfermeiro;
use App\Models\Recepcionista;
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
        return view('Funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $user = new User;
        $user->fill($request->input('usuario'));
        $user->name = $request->input('funcionario.nome');
        $user->save();

        $funcionario = new Funcionario;
        $funcionario->fill($request->input('funcionario'));

        $funcionario->user()->associate($user);

        if($request->input('usuario.cargo')=='Laboratorista'){
            $cargo = new Laboratorista;
            $cargo->fill($request->input('laboratorista'));
            
            $funcionario->laboratorista()->save($cargo);
        }
        if($request->input('usuario.cargo')=='Medico'){
            $cargo = new Medico;
            $cargo->fill($request->input('medico'));
            $funcionario->medico()->save($cargo);
        }
        
        if($request->input('usuario.cargo')=='Recepcionista'){
            $cargo = new Recepcionista;
            $cargo->fill($request->input('recepcionista'));
            $cargo->funcionario()->associate($funcionario);
            $cargo->save();
        }
        
        if($request->input('usuario.cargo')=='Administrativo'){
            $cargo = new Administrativo;
            
            $cargo->fill($request->input('administrativo'));
            
            $funcionario->administrativo()->save($cargo);
        }
        
        if($request->input('usuario.cargo')=='Enfermeiro'){
            $cargo = new Enfermeiro;
            $cargo->fill($request->input('enfermeiro'));
            $funcionario->enfermeiro()->save($cargo);
        }

        $cargo->save();
        $funcionario->save();        
        
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
      */
    public function show(Funcionario $funcionario)
    {
        return view('Funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('Funcionarios.edit', compact('funcionario'));
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
