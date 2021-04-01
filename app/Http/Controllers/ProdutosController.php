<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    public function index(){
        return view('produto.index')->with(['produtos'=>Produto::all(),'categories'=>Category::all()]);
    }


    public function create(){
        return view('produto.create')->with('categories', Category::all());
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
            'category_id'   => $request->category_id,
            'fk_tagproduto' => $request->fk_tagproduto,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1,
            'hx_foto2'      => $foto2

        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', 'Produto foi cadastrado com sucesso!');

        return redirect(route('produto.index'));
    }

    public function edit(Produto $produto){
        return view('produto.edit')->with(['produto'=>$produto,'categories'=>Category::all()]);
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
            'category_id'   => $request->category_id,
            'fk_tagproduto' => $request->fk_tagproduto,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1,
            'hx_foto2'      => $foto2

        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $request->id foi alterado com sucesso!");

        return redirect(route('produto.index'));
    }

    public function destroy (Produto $produto){
        $produto -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $produto->id foi deletado com sucesso!");
        return redirect(route('produto.index'));
    }

    public function trash(){
        return view('produto.trash')->with(['produtos'=>Produto::onlyTrashed()->get(),'categories'=>Category::all()]);
    }

    public function restore($id){
        $produto = Produto::onlyTrashed()->where('id',$id)->firstOrFail();
        $produto->restore();

        session() -> flash('valido', "Produto $produto->id foi restaurado com sucesso!");
        return redirect(route('produto.trash'));
    }

}
