<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleicao;
use App\Models\Candidato;


class EleicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        
    }

    public function index()
    {
        //
        $user = auth()->user();

        $eleicao = $user->eleicaos;

        return view('eleicao.index', ['eleicao'=>$eleicao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eleicao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $eleicao = new Eleicao;
        $eleicao->name = $request->name;
        $eleicao->description = $request->description;
        $eleicao->date_start = $request->date_start;
        $eleicao->date_end = $request->date_end;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/imagens'), $imageName);
            $eleicao->image = $imageName;
        } 
        $user = auth()->user();
        $eleicao->user_id = $user->id;
        $eleicao->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $eleicao = Eleicao::findOrFail($id);

        $candidatosConcorrentes = $eleicao->candidatos;

        return view('eleicao.show',['eleicao'=>$eleicao,'candidatosConcorrentes'=>$candidatosConcorrentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $eleicao = Eleicao::findOrFail($id);

        return view('eleicao.edit',['eleicao'=>$eleicao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $eleicao = Eleicao::findOrFail($id);
        $eleicao->name = $request->name;
        $eleicao->description = $request->description;
        $eleicao->date_start = $request->date_start;
        $eleicao->date_end = $request->date_end;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/imagens'), $imageName);
            $eleicao->image = $imageName;
        } 
        $eleicao->update();
        return redirect('/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Eleicao::findOrFail($id)->delete();
        return redirect('/');

    }

    public function searchcandidate($id)
    {
        $search = request('search');
            /*$candidato = Candidato::where('name','like','%'.$search.'%')->get();*/
            $user = auth()->user();
            $candidato = $user->candidatos()->where('name','like','%'.$search.'%')->get();;
            $eleicao = Eleicao::findOrFail($id);
            $candidatosConcorrentes = $eleicao->candidatos;
            if(empty($candidato)){
                return redirect("eleicao.show",['eleicao'=>$eleicao]);
            }else{
                return view("eleicao.show",['candidato'=>$candidato,'search'=>$search,'eleicao'=>$eleicao,'candidatosConcorrentes'=>$candidatosConcorrentes]);
            }
    }

    public function vincularCandidato($id1,$id2){
        $eleicao = Eleicao::findOrFail($id1);
        $candidato = Candidato::findOrFail($id2);

        $candidato->eleicaoCandidatos()->attach($id1);
        return redirect('/');
    }

   /* public function eleicao_welcome(){
        $eleicoes = Eleicao::all();
        return view('welcome',['eleicoes'=>$eleicoes]);
    } */

    public function votando($id1,$id2){
        $user = auth()->user();
        $user->usercandidatos()->attach($id2);
        $user->usereleicoes()->attach($id1);
        $eleicao = Eleicao::findOrFail($id1);
        $eleicao->candidatosvotos()->attach($id2);
        return redirect('/');
    }

}
