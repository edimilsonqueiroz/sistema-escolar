<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'sexo'
    ];
}
