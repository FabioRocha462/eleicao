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
                    @if($c->eleicaoCandidatos()->where('eleicaos.id',$eleicao->id))
                    <p><strong>este Candidato já participa desta eleiçaõ</strong></p>
                    @else
                    <form action="/vincular/{{$eleicao->id}}/{{$c->id}}" method="POST">
                        @csrf
                        <a href="/vincular/{{$eleicao->id}}/{{$c->id}}"
                        class="btn btn-primary"  id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit()">
                        Vincular
                       </a>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        @endif   
        </div>
<div class="show_eleicao">
<div class="card" style="width: 18rem;">
  <img src="../img/imagens/{{$eleicao->image}}" class="card-img-top" alt="{{$eleicao->name}}">
  <div class="card-body">
  <h5 class="card-title">{{$eleicao->name}}</h5>
                <p class="card-text">{{$eleicao->description}}.</p>
                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                  </svg> {{date('d/m/y', strtotime($eleicao->date_start))}}-{{date('d/m/y', strtotime($eleicao->date_end))}}</p>
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
                                    <p class="card-text"><small class="text-muted"><b>{{$eleicao->candidatosvotos()->where('candidatos.id',$concorrentes->id)->count()}} votos </br></small></p>
                                  <a class="btn btn-warning" href="{{route('candidato.show',$concorrentes->id)}}"><b>Saber mais</b></a>
                                  <hr>
                              @if(  ($dateToday > $eleicao->date_start) && ($dateToday <= $eleicao->date_end ) )
                              <p><b>Ainda não está na data</b></p>
                              @else
                                  @if(auth()->user()->usereleicoes()->where('eleicaos.id',$eleicao->id)->count() > 0)
                                    <p><b>Você já votou nessa eleição</b></p>
                                 @else
                                     <form action="/votando/{{$eleicao->id}}/{{$concorrentes->id}}" method="POST">
                                        @csrf
                                        <a href="/votando/{{$eleicao->id}}/{{$concorrentes->id}}"
                                        class="btn btn-warning"  id="event-submit"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit()">
                                        <b>Votar</b>
                                      </a>
                                    </form>
                                @endif
                              @endif
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