@extends('layouts.main')
@section('title','show Eleicao')
@section('content')
<main class="container">
<div class="show_eleicao">
<
        <div class="card" style="width: 18rem;">
            <img src="../img/imagens/{{$candidato->image}}" class="card-img-top" alt="{{$candidato->name}}">
            <div class="card-body">
                            <h5 class="card-title">{{$candidato->name}}</h5>
                            <p class="card-text">{{$candidato->description}}.</p>
            </div>
        </div>
    </div>
</main>
@endsection