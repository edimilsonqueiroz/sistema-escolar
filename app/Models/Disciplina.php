<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'disciplinas';
    
    protected $fillable = [
        'nome',
    ];

    public function matriculas(){
        return $this->belongsToMany(Matricula::class, 'disciplinas_matriculas', 'disciplina_id','matricula_id');
    }
}
