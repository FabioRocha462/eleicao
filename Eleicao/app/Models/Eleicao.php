<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    protected $date = ['date'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function candidatos(){
        return $this->belongsToMany('App\Models\Candidato');
    }


    
    public function candidatosvotos(){
        return $this->belongsToMany(Candidato::class,'candidato_eleicao_voto','eleicao_id','candidato_id');
    }
    


}
