<?php

namespace App\Http\Controllers;
use App\Veterinario;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vets = Veterinario::orderBy('nome', 'ASC')->get();
        $users = User::orderBy('name', 'ASC')->get();
        return view('vet.listavet', ['vets' => $vets, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('vet.cadastrovet', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vet = new Veterinario();
        $vet->nome = $request->input('nome');
        $vet->rua = $request->input('rua');
        $vet->bairro = $request->input('bairro');
        $vet->cidade = $request->input('cidade');
        $vet->telefone = $request->input('telefone');
        $vet->celular = $request->input('celular');
        $vet->user_id = $request->input('id');

        if(isset($vet)){
            $vet->save();
            Alert::success('Registro salvo!', 'O registro foi salvo com sucesso');
            return redirect('/vets');
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
        $vet = Veterinario::find($id);
        $user = User::orderBy('name', 'ASC')->get();
        return view('vet.cadastrovet', ['vet' => $vet, 'user' => $user]);
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
        $vet = Veterinario::find($id);
        $vet->nome = $request->input('nome');
        $vet->rua = $request->input('rua');
        $vet->bairro = $request->input('bairro');
        $vet->cidade = $request->input('cidade');
        $vet->telefone = $request->input('telefone');
        $vet->celular = $request->input('celular');
        $vet->user_id = $request->input('id');

        if(isset($vet)){
            $vet->update();
            Alert::success('Registro alterado!', 'O registro foi alterado com sucesso');
            return redirect('/vets');
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
        Veterinario::destroy($id);

        $vets = Veterinario::orderBy('nome', 'ASC')->get();
        return view('vet.listavet', ['vets' => $vets]);
    }
}
