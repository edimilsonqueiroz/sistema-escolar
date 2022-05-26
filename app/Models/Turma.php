<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'nome',
        'nome_escola',
        'ano',
        'serie'
    ];

    public function matriculas(){
        return $this->hasMany(Matricula::class, 'turma_id');
    }
}
