<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    public function index(){
        return view('produto.index')->with('produtos', Produto::all());
    }


    public function create(){
        return view('produto.create');
    }

    public function store(Request $request){

        //Ajustando as imagens do produto
        if($request->hx_foto1){
            $foto1 = "storage/" . $request->file('hx_foto1')->store('produtos');
        }else{
            $foto1 = "storage/sem.jpg";
        }

        if($request->hx_foto2){
            $foto2 = "storage/" . $request->file('hx_foto2')->store('produtos');
        }else{
            $foto2 = "storage/sem.jpg";
        }


        Produto::create([
            'ds_nome'       => $request->ds_nome,
            'ds_descricao'  => $request->ds_descricao,
            'fk_categoria'  => $request->fk_categoria,
            'fk_tagproduto' => $request->fk_tagproduto,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1,
            'hx_foto2'      => $foto2

        ]);

        //Para dar um retorno para o usuário
        session() -> flash('success', 'Produto foi cadastrado com sucesso!');

        return redirect(route('produto.index'));
    }

    public function edit(Produto $produto){
        return view('produto.edit') -> with('produto', $produto);
    }

    public function update(Request $request, Produto $produto){

        //Ajustando as imagens do produto
        if($request->hx_foto1){
            $foto1 = "storage/" . $request->file('hx_foto1')->store('produtos');
            //Só apaga se não for a padrão
            if($produto->hx_foto1 != "storage/sem.jpg"){
                Storage::delete(str_replace('storage/','',$produto->hx_foto1));
            }
        }else{
            $foto1 = $produto->hx_foto1;
        }

        if($request->hx_foto2){
            $foto2 = "storage/" . $request->file('hx_foto2')->store('produtos');

            //Só apaga se não for a padrão
            if($produto->hx_foto2 != "storage/sem.jpg"){
                Storage::delete(str_replace('storage/','',$produto->hx_foto2));
            }
        }else{
            $foto2 = $produto->hx_foto2;
        }

        $produto->update([
            'ds_nome'       => $request->ds_nome,
            'ds_descricao'  => $request->ds_descricao,
            'fk_categoria'  => $request->fk_categoria,
            'fk_tagproduto' => $request->fk_tagproduto,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1,
            'hx_foto2'      => $foto2

        ]);

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
