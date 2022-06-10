@extends('layouts.main')
@section('title','show Eleicao')
@section('content')
<h1>show eleição</h1>
<img src="../img/imagens/{{$eleicao->image}}" class="card-img-top" alt="{{$eleicao->name}}" height="250px" width="250px">
<p>{{$eleicao->name}}</p>
<a href="{{route('candidato.create')}}">Adicione um Candidato</a>

@endsection