<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Aluno;

class AlunoController extends Controller
{
   
    public function index()
    {
        $alunos = Aluno::all();

        return view('admin.alunos.listar', [
            'alunos' => $alunos
        ]);
    }

   
    public function create()
    {
        return view('admin.alunos.cadastrar');
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'=>['required','string', 'min:4'],
            'data_nascimento'=> ['required','date'],
            'cpf' => ['required','string','max:11','unique:alunos'],
            'sexo' => ['required', 'string']
        ]);

        if($validator->fails()){
            return redirect()->route('create-aluno')->withErrors($validator)->withInput();
        }else{
            Aluno::create([
                'nome'=> $request->input('nome'),
                'data_nascimento'=> $request->input('data_nascimento'),
                'cpf' => $request->input('cpf'),
                'sexo' => $request->input('sexo')
            ]);

            session()->flash('sucesso', 'Aluno cadastrado com sucesso.');

            return redirect()->route('create-aluno');
        }
    }

   
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        return view('admin.alunos.editar',[
            'aluno'=> $aluno
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome'=>['required','string', 'min:4'],
            'data_nascimento'=> ['required','date'],
            'cpf' => ['required','string','max:11'],
            'sexo' => ['required', 'string']
        ]);

        

        if($validator->fails()){
            return redirect()->route('edit-aluno', $id)->withErrors($validator)->withInput();
        }else{
            Aluno::where('id', $id)->update([
                'nome'=> $request->input('nome'),
                'data_nascimento'=> $request->input('data_nascimento'),
                'cpf' => $request->input('cpf'),
                'sexo' => $request->input('sexo')
            ]);

            session()->flash('sucesso', 'Aluno alterado com sucesso.');

            return redirect()->route('edit-aluno', $id);
        }
        

        dd($request->all());
    }

    public function destroy(Request $request)
    {
        $dados = $request->input('id');

        if(!$dados){
            return redirect()->route('alunos');
        }
        
        for($i=0; $i<count($dados); $i++){
            $id = $dados[$i];
            Aluno::where('id', $id)->delete();
        }

        return redirect()->route('alunos');
        
    }
}
