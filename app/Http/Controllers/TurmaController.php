<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Turma;

class TurmaController extends Controller
{
    
    public function index()
    {
        $turmas = Turma::all();
        return view('admin.turmas.listar', [
            'turmas' => $turmas
        ]);
    }

   
    public function create()
    {
        return view('admin.turmas.cadastrar');
    }

  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => ['required', 'string', 'min:4'],
            'nome_escola' => ['required', 'string', 'min:4'],
            'serie' => ['required', 'string'],
            'ano' => ['required', 'numeric']
        ]);

        if($validator->fails()){
            return redirect()->route('create-turma')->withErrors($validator)->withInput();
        }else{
            Turma::create([
                'nome'=> $request->input('nome'),
                'nome_escola'=> $request->input('nome_escola'),
                'ano' => $request->input('ano'),
                'serie' => $request->input('serie')
            ]);

            session()->flash('sucesso', 'Turma cadastrada com sucesso.');

            return redirect()->route('create-turma');
        }
    }

   
    public function edit($id)
    {
        $turma = Turma::find($id);

        if(!$turma){
            return redirect()->route('turmas');
        }

        return view('admin.turmas.editar', [
            'turma' => $turma
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => ['required', 'string', 'min:4'],
            'nome_escola' => ['required', 'string', 'min:4'],
            'serie' => ['required', 'string'],
            'ano' => ['required', 'numeric']
        ]);

        if($validator->fails()){
            return redirect()->route('edit-turma', $id)->withErrors($validator)->withInput();
        }else{

            Turma::where('id', $id)->update([
                'nome'=> $request->input('nome'),
                'nome_escola'=> $request->input('nome_escola'),
                'ano' => $request->input('ano'),
                'serie' => $request->input('serie')
           ]);

            session()->flash('sucesso', 'Turma alterada com sucesso.');

            return redirect()->route('edit-turma', $id);

        }
    }

  
    public function destroy(Request $request)
    {
        $dados = $request->input('id');

        if(!$dados){
            return redirect()->route('turmas');
        }
        
        for($i=0; $i<count($dados); $i++){
            $id = $dados[$i];

            Turma::where('id', $id)->delete();
        }

        return redirect()->route('turmas');
    }
}
