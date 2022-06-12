@extends('layouts.main')
@section('title','show Eleicao')
@section('content')

<main class="container">
    @if(auth()->user()->id == $eleicao->user_id)
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
                    <form action="/vincular/{{$eleicao->id}}/{{$c->id}}" method="POST">
                        @csrf
                        <a href="/vincular/{{$eleicao->id}}/{{$c->id}}"
                        class="btn btn-primary"  id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit()">
                        Vincular
                       </a>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
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
<div class="eleicoes_welcome">
            <div class="row">
              <div class="col-sm-12 text-dark text-center my-4" >
                  <h2>Candidatos</h2>
            </div>
            @if($candidatosConcorrentes)  
            <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($candidatosConcorrentes as $concorrentes)
  
                              <div class="col">
                                <div class="card h-100">
                                  <img src="../img/imagens/{{$concorrentes->image}}" class="card-img-top" alt="{{$concorrentes->nome}}">
                                  <div class="card-body">
                                    <hr>
                                    <h5 class="card-title">{{$concorrentes->name}}</h5>
                                  <a class="btn btn-warning" href="{{route('candidato.show',$concorrentes->id)}}"><b>Saber mais</b></a>
                                  <a class="btn btn-warning" href="#"><b>Votar</b></a>
                                  </div>
                                </div>
                              </div>
                            
                            @endforeach
            @else
            <p><strong>Não Temos Candidatos Concorrendo  no Momento :(</strong></p> 
            @endif
</div>
</main>
@endsection