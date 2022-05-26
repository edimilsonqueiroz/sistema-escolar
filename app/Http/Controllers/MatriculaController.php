<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\DisciplinaMatricula;

class MatriculaController extends Controller
{
   
    public function index()
    {
        $matriculas = Matricula::all();

        return view('admin.matriculas.listar',[
            'matriculas' => $matriculas
        ]);
    }

   
    public function create()
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();

        return view('admin.matriculas.cadastrar',[
            'alunos' => $alunos,
            'turmas' => $turmas, 
            'disciplinas' => $disciplinas
        ]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aluno' => ['required'],
            'turma' => ['required'],
            'ano' => ['required', 'numeric'],
            'disciplina' => ['required']
        ]);

        if($validator->fails()){
            return redirect()->route('create-matricula')->withErrors($validator)->withInput();
        }else{

            $matricula = Matricula::where('aluno_id', $request->input('aluno'))
            ->where('ano', $request->input('ano'))->first();

            if($matricula){

                session()->flash('error', 'Aluno já possui uma matricula no ano informado.');
                return redirect()->route('create-matricula')->withInput();
            }


            $idMatricula = Matricula::insertGetId([
                'ano' => $request->input('ano'),
                'aluno_id' => $request->input('aluno'),
                'turma_id' => $request->input('turma')
            ]);

            $disciplinas = $request->input('disciplina');


           for($i = 0; $i<count($disciplinas); $i++){

                DisciplinaMatricula::create([
                    'matricula_id' => $idMatricula,
                    'disciplina_id' => $disciplinas[$i]
                ]);
           }

           session()->flash('sucesso', 'Matricula realizada com sucesso.');

           return redirect()->route('create-matricula');
        }
    }

   
    public function edit($id)
    {
        $matricula = Matricula::find($id);
        $turmas = Turma::where('id', '!=', $matricula->turma_id)->get();
        $alunos = Aluno::where('id', '!=', $matricula->aluno_id)->get();
        $disciplinas = Disciplina::all();
        $disciplinasMatricula = $matricula->disciplinas()->get();
        $dados = $disciplinas->diff($disciplinasMatricula);

    
       
        return view('admin.matriculas.editar',[
            'matricula' => $matricula,
            'turmas' => $turmas,
            'alunos' => $alunos,
            'disciplinas' => $dados->all()
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'aluno' => ['required'],
            'turma' => ['required'],
            'ano' => ['required', 'numeric'],
            'disciplina' => ['required']
        ]);

        if($validator->fails()){
            return redirect()->route('edit-matricula')->withErrors($validator);
        }else{

            $matricula = Matricula::where('aluno_id', $request->input('aluno_id'))
            ->where('ano', $request->input('ano'))
            ->first();

            if($matricula){

                session()->flash('error', 'Aluno já tem uma matricula no ano informado.');

                return redirect()->route('edit-matricula',$id);

            }else{

           
            Matricula::where('id', $id)->update([
                'ano' => $request->input('ano'),
                'aluno_id' => $request->input('aluno'),
                'turma_id' => $request->input('turma')
            ]);

            $disciplinas = $request->input('disciplina');
            $disciplinasMatricula = DisciplinaMatricula::where('matricula_id', $id)->get();

            if(count($disciplinas) != count($disciplinasMatricula)){
                DisciplinaMatricula::where('matricula_id', $id)->delete();

                for($i = 0; $i<count($disciplinas); $i++){
                    DisciplinaMatricula::create([
                        'matricula_id' => $id,
                        'disciplina_id' => $disciplinas[$i]
                    ]);
               }
            }

        }
            
            session()->flash('sucesso', 'Matricula alterada com sucesso.');

           return redirect()->route('edit-matricula',$id);

        }

    }

  
    public function destroy(Request $request)
    {
        $dados = $request->input('matricula');

        if(!$dados){
            return redirect()->route('matriculas');
        }
        
        for($i=0; $i<count($dados); $i++){
            $id = $dados[$i];
            DisciplinaMatricula::where('matricula_id', $id)->delete();
            Matricula::where('id', $id)->delete();
        }

        return redirect()->route('matriculas');
    }
}
