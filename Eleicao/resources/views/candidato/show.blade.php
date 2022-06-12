@extends('layouts.main')
@section('title','show Eleicao')
@section('content')
<main class="container">
<div class="show_eleicao">
<div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="../img/imagens/{{$candidato->image}}" class="img-fluid rounded-start" alt="{{$candidato->name}}">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$candidato->name}}</h5>
                <p class="card-text">{{$candidato->description}}.</p>
            </div>
            </div>
        </div>
        </div>
</div>
</main>
@endsection