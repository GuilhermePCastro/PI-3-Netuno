<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutosController extends Controller
{
    public function index(){
        return view('produto.index')->with('produtos', Produto::all());
    }


    public function create(){
        return view('produto.create');
    }

    public function store(Request $request){
        Produto::create($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('success', 'Produto foi cadastrado com sucesso!');

        return redirect(route('produto.index'));
    }

    public function edit(Produto $produto){
        return view('produto.edit') -> with('produto', $produto);
    }

    public function update(Request $request, Produto $produto){

        //Update pode ser dos dois jeitos (com all ou cada campo especificado)
        /*
        $product->update([
            'name'          => $request -> name,
            'description'   => $request -> description,
            'price'         => $request -> price
        ]);*/

        $produto->update($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('success', "Produto $request->id foi alterado com sucesso!");

        return redirect(route('produto.index'));
    }

    public function destroy (Produto $produto){
        $produto -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('success', "Produto $produto->id foi deletado com sucesso!");
        return redirect(route('produto.index'));
    }

}
