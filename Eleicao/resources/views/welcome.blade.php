@extends('layouts.main')
@section('title','welcome')
@section('content')

<main>
<img src="{{URL::asset('../img/votoonline.png')}}" class="img-fluid" alt="figura 1" heigth="50%" width="50%" >
<div class="eleicoes_welcome">
            <div class="row">
              <div class="col-sm-12 text-dark text-center my-4" >
                  <h2>Eleições</h2>
            </div>
            @if($eleicoes)  
            <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($eleicoes as $eleicao)
  
                              <div class="col">
                                <div class="card h-100">
                                  <img src="../img/imagens/{{$eleicao->image}}" class="card-img-top" alt="{{$eleicao->nome}}"  height="250">
                                  <div class="card-body">
                                    <hr>
                                    <h5 class="card-title">{{$eleicao->name}}</h5>
                                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                  </svg> {{date('d/m/y', strtotime($eleicao->date_start))}}-{{date('d/m/y', strtotime($eleicao->date_end))}}</p>
                                  </p><a class="btn btn-warning" href="{{route('eleicao.show',$eleicao->id)}}"><b>Visualizar</b></a>
                                  </div>
                                </div>
                              </div>
                            
                            @endforeach
            @else
            <p><strong>Não Temos Eleições no Momento :(</strong></p> 
            @endif
</div>
</main>
@endsection
