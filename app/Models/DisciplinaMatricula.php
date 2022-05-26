<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaMatricula extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "disciplinas_matriculas";
    
    protected $fillable = [
        'matricula_id',
        'disciplina_id'
    ];
}
