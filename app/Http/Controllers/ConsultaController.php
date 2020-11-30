<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Consulta;
use App\Veterinario;
use App\Pet;
use App\User;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::where('user_id', Auth::user()->id)
        ->orderBy('data', 'DESC')
        ->get();

        return view('consulta.listaconsulta', ['consultas' => $consultas]);
    }

    public function formataData($data){
        return date("d/m/Y", strtotime($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vets = Veterinario::orderBy('nome', 'ASC')->get();

        $pets = $pets = Pet::orderBy('nome', 'ASC')
        ->where('user_id', Auth::id())
        ->get();

        $users = User::orderBy('name', 'ASC')->get();
        return view('consulta.cadastroconsulta', ['vets' => $vets, 'pets' => $pets, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Cuiaba');

        $data = $request->input('data');

        $consulta = new Consulta();
        $consulta->vacina = $request->input('vacina');
        $consulta->descricao = $request->input('descricao');
        $consulta->remedio = $request->input('remedio');
        $consulta->vet_id = $request->input('vets');
        $consulta->pet_id = $request->input('pets');
        $consulta->user_id = $request->input('id');
        $consulta->data = date("Y/m/d", strtotime($data));

        if(isset($consulta)){
            $consulta->save();
            Alert::success('Registro salvo!', 'O registro foi salvo com sucesso');
            return redirect('/consulta');
        } else {
            Alert::error('Erro!', 'Ocorreu um erro ao salvar');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $vets = Veterinario::orderBy('nome', 'ASC')->get();
        $pets = Pet::orderBy('nome', 'ASC')->get();
        $users = User::orderBy('name', 'ASC')->get();
        
        return view('consulta.cadastroconsulta', ['consulta' => $consulta, 'vets' => $vets, 'pets' => $pets, 'users' => $users]);
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
        $consulta = Consulta::find($id);

        $data = $request->input('data');

        $consulta->vacina = $request->input('vacina');
        $consulta->descricao = $request->input('descricao');
        $consulta->remedio = $request->input('remedio');
        $consulta->vet_id = $request->input('vets');
        $consulta->pet_id = $request->input('pets');
        $consulta->user_id = $request->input('id');
        $consulta->data = date("Y/m/d", strtotime($data));

        if(isset($consulta)){
            $consulta->update();
            Alert::success('Registro alterado!', 'O registro foi alterado com sucesso');
            return redirect('/consulta');
        } else {
            Alert::error('Erro!', 'Ocorreu um erro ao alterar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consulta::destroy($id);

        $consultas = Consulta::orderBy('data', 'ASC')->get();
        return view('consulta.listaconsulta', ['consultas' => $consultas]);
    }
}
