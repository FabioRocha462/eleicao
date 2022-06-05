@extends('layouts.main')
@section('title','Criar Eleicao')
@section('content')
<main class='container'>
<h2>Crie sua Eleicao</h2>
    <div class='centro'>
            <form action="">
            <input class="form-control form-control-lg" type="text" name="nome"placeholder="Descrição?" aria-label=".form-control-lg example">
            <div class="col">
                <input type="date" name= "data" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            </form>
    </div>
</main>
@endsection