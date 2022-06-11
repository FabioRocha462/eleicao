@extends('layouts.main')
@section('title','show Eleicao')
@section('content')

<main class="container">
        <form  action="/{{$eleicao->id}}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="search"placeholder="Pesquisar por candidato" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div  class="search_candidate">
             @if(empty($candidato))
                <p>Pesquise</p>
            @else
            @foreach($candidato as $c)
            <div class="card" style="width: 18rem;">
                <img src="../img/imagens/{{$c->image}}" class="card-img-top" alt="{{$c->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$c->name}}</h5>
                    <p class="card-text">{{$c->description}}.</p>
                    <a href="#" class="btn btn-success">Vincular</a>
                </div>
            </div>
            @endforeach
            @endif
             
        </div>
<div class="show_eleicao">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="../img/imagens/{{$eleicao->image}}" class="img-fluid rounded-start" alt="{{$eleicao->name}}">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$eleicao->name}}</h5>
                <p class="card-text">{{$eleicao->description}}.</p>
                <p class="card-text"><small class="text-muted">Data início: {{$eleicao->date_start}}</small></p>
                <p class="card-text"><small class="text-muted">Data fim: {{$eleicao->date_end}}</small></p>
            </div>
            </div>
        </div>
        </div>
</div>
</main>
@endsection