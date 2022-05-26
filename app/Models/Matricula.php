<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'matriculas';

    protected $fillable = [
        'ano',
        'aluno_id',
        'turma_id',
    ];

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class,'disciplinas_matriculas', 'matricula_id','disciplina_id');
    }

    public function aluno(){
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
