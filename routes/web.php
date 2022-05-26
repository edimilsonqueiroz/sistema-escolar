<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class, 'render'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('authenticate');


Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'render'])->name('painel');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    // ROTAS CRUD DE ALUNOS 
    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos');
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('create-aluno');
    Route::post('/aluno/store', [AlunoController::class, 'store'])->name('store-aluno');
    Route::get('/aluno/{id}/edit', [AlunoController::class, 'edit'])->name('edit-aluno');
    Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('update-aluno');
    Route::delete('/aluno/delete', [AlunoController::class, 'destroy'])->name('delete-aluno');

    // ROTAS CRUD DE TURMAS
    Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas');
    Route::get('/turma/create', [TurmaController::class, 'create'])->name('create-turma');
    Route::post('/turma/store', [TurmaController::class, 'store'])->name('store-turma');
    Route::get('/turma/{id}/edit', [TurmaController::class, 'edit'])->name('edit-turma');
    Route::put('/turma/{id}/update', [TurmaController::class, 'update'])->name('update-turma');
    Route::delete('/turma/delete', [TurmaController::class, 'destroy'])->name('delete-turma');

    // ROTAS CRUD DE DISCIPLINAS

    // ROTAS CRUD DE MATRICULAS
    Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas');
    Route::get('/matricula/create', [MatriculaController::class, 'create'])->name('create-matricula');
    Route::post('/matricula/store', [MatriculaController::class, 'store'])->name('store-matricula');
    Route::get('/matricula/{id}/edit', [MatriculaController::class, 'edit'])->name('edit-matricula');
    Route::put('/matricula/{id}/update', [MatriculaController::class, 'update'])->name('update-matricula');
    Route::delete('/matricula/delete', [MatriculaController::class, 'destroy'])->name('delete-matricula');


});

