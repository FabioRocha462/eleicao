@extends('layouts.main')
@section('title','Crie seu Candidato')
@section('content')
<main class='container'>
    <div class="centro">
                 <h2 id="CreateEleicao">Crie seu Candidato</h2>
                 <form action="{{route('candidato.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                            <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"></label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="nome" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Descreva seu Candidato"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                <br>
                                <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-danger"  type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-primary"  type="submit">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>  
                            
                     </form>
        </div>
</main>
@endsection