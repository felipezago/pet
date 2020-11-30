<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\User;
use Auth;

use RealRashid\SweetAlert\Facades\Alert;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::OrderBy('nome', 'ASC')
        ->where('user_id', Auth::id())
        ->get();
        return view('pet.listapet', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();
        
        return view('pet.cadastropet', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->nome = $request->input('nome');
        $pet->especie = $request->input('especie');
        $pet->raca = $request->input('raca');
        $pet->altura = $request->input('altura');
        $pet->peso = $request->input('peso');
        $pet->user_id = $request->input('id');

        if(isset($pet)){
            $pet->save();
            Alert::success('Registro salvo!', 'O registro foi salvo com sucesso');
            return redirect('/pets');
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
        $pet = Pet::find($id);
        $user = User::orderBy('name', 'ASC')->get();
        return view('pet.cadastropet', ['pet' => $pet, 'user' => $user]);
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
        $pet = Pet::find($id);
        $pet->nome = $request->input('nome');
        $pet->especie = $request->input('especie');
        $pet->raca = $request->input('raca');
        $pet->altura = $request->input('altura');
        $pet->peso = $request->input('peso');
        $pet->user_id = $request->input('id');

        if(isset($pet)){
            $pet->update();
            Alert::success('Registro alterado!', 'O registro foi alterado com sucesso');
            return redirect('/pets');
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
        Pet::destroy($id);

        $pet = Pet::orderBy('nome', 'ASC')->get();
        return view('pet.listapet', ['pets' => $pet]);
    }
}
