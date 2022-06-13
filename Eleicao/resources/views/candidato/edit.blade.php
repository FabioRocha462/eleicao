@extends('layouts.main')
@section('title','Edite seu Candidato')
@section('content')
<main class='container'>
    <div class="centro">
                 <h2 id="CreateEleicao">Edite seu Candidato</h2>
                 <form action="{{route('candidato.update',$candidato->id)}} "method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                            <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"></label>
                                    <input type="text" class="form-control" value="{{$candidato->name}}" name="name" id="exampleInputEmail1" placeholder="nome" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Descreva seu Candidato">{{$candidato->description}}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" value="{{$candidato->image}}"type="file" name="image" id="formFile">
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