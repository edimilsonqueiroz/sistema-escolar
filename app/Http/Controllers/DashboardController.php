<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Matricula;

class DashboardController extends Controller
{
    public function render(){
        $alunos = Aluno::count();
        $turmas = Turma::count();
        $matriculas = Matricula::count();

        return view('admin.dashboard', [
            'alunos' => $alunos,
            'turmas' => $turmas,
            'matriculas' => $matriculas
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
