<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{

    public function index(){
        return view('cliente.index')->with('clientes', Cliente::paginate(5));
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        Cliente::create([
            'user_id'       => Auth()->user()->id,
            'ds_cpf'        => $request->ds_cpf,
            'ds_celular'    => $request->ds_celular,
            'ds_endereco'   => '',
            'ds_numero'     => '',
            'ds_cep'        => '',
            'ds_cidade'     => '',
            'ds_uf'         => '',
        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Dados pessoais atualizados!");
        return redirect('/');

    }

    public function show(Cliente $cliente)
    {
       return view('cliente.show')->with(['cliente' => $cliente, 'usuario' => $cliente->usuario()]);
    }

    public function edit(Cliente $cliente){
        return view('cliente.edit')->with('cliente', $cliente);
    }

    public function update(Request $request, Cliente $cliente){
        $cliente->update([
            'ds_celular'    => $request->ds_celular,
            'ds_endereco'   => $request->ds_endereco,
            'ds_numero'     => $request->ds_numero,
            'ds_cep'        => $request->ds_cep,
            'ds_cidade'     => $request->ds_cidade,
            'ds_uf'         => $request->ds_uf,
        ]);

        //Trocando nome do usuário
       $user = User::where('id', '=', Auth()->user()->id)->first();

       $user->update(['name'=> $request->ds_nome,]);

        session() -> flash('valido', "Dados pessoais atualizados!");
        return redirect(route('cliente.show', $cliente->id));
    }

    public function destroy (Cliente $cliente){

        $cliente -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Cliente $cliente->id foi deletado com sucesso!");
        return redirect(route('cliente.show'));
    }

    public function trash(){
        return view('cliente.trash')->with(['clientes'=>Cliente::onlyTrashed()->get()]);
    }

    public function restore($id){
        $cliente = Cliente::onlyTrashed()->where('id',$id)->firstOrFail();
        $cliente->restore();

        session() -> flash('valido', "Cliente $cliente->id foi restaurado com sucesso!");
        return redirect(route('cliente.trash'));
    }

    public function tornarAdmin(int $id){

        $cliente = Cliente::find($id);

        $user = User::where('id', '=', $cliente->user_id)->first();
        if($user->IsAdmin == 0){

            $user->update(['IsAdmin' => '1']);
            session() -> flash('valido', "Cliente $cliente->id virou admin!");

        }else{

            $user->update(['IsAdmin' => '0']);
            session() -> flash('valido', "Cliente $cliente->id não é mais admin!");

        }


        return redirect(route('cliente.index'));
    }

    public function filtro(Request $request){

        $clientes = Cliente::where('id', '>', '0');

        if($request->user != ''){
            $clientes = $clientes->where('user_id','=', $request->user);
        }

        if($request->cpf != ''){

            $clientes = $clientes->where('ds_cpf','=', $request->cpf);
        }



        return view('cliente.index')->with('clientes',  $clientes->paginate(5));
    }
}
