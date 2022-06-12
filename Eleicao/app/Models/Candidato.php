<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $casts = [
        'items' => 'array'
    ];

    protected $date = ['date'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function eleicaoCandidatos(){
        return $this->belongsToMany('App\Models\Eleicao');
    }
}
