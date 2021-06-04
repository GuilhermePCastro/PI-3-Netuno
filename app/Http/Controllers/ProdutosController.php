<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{

    public function index(){
        return view('produto.index')->with(['produtos'=>Produto::paginate(5) ,'categories'=>Category::all()]);
    }


    public function create(){
        return view('produto.create')->with(['categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function show(Produto $produto){
        return view('produto.show')->with('produto', $produto);
    }

    public function store(Request $request){

        //Ajustando as imagens do produto
        if($request->hx_foto1){
            $foto1 = "storage/" . $request->file('hx_foto1')->store('produtos');
        }else{
            $foto1 = "storage/sem.jpg";
        }


        $produto = Produto::create([
            'ds_nome'       => $request->ds_nome,
            'ds_descricao'  => $request->ds_descricao,
            'category_id'   => $request->category_id,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1

        ]);

        $produto->tags()->sync($request->tags);
        //Para dar um retorno para o usuário
        session() -> flash('valido', 'Produto foi cadastrado com sucesso!');

        return redirect(route('produto.index'));
    }

    public function edit(Produto $produto){
        return view('produto.edit')->with(['produto'=>$produto,'categories'=>Category::all(), 'tags'=>Tag::all()]);
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


        $produto->update([
            'ds_nome'       => $request->ds_nome,
            'ds_descricao'  => $request->ds_descricao,
            'category_id'   => $request->category_id,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'qt_estoquemin' => $request->qt_estoquemin,
            'qt_estoquemax' => $request->qt_estoquemax,
            'hx_foto1'      => $foto1

        ]);

        $produto->tags()->sync($request->tags);
        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $produto->id foi alterado com sucesso!");

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

    public function search(Request $request){
        $produtos = Produto::where('ds_nome','like', '%' . $request->search . '%')->paginate(8);
        $count = Produto::where('ds_nome','like', '%' . $request->search . '%')->count();
        return view('produto.search')->with(['produtos' => $produtos, 'search' => $request->search, 'count' => $count]);
    }

    public function filtro(Request $request){
        $produtos = Produto::where('id', '>', '0');

        if($request->nome != ''){
            $produtos = $produtos->where('ds_nome','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $produtos = $produtos->where('id','=', $request->codigo );
        }

        if($request->category_id != ''){
            $produtos = $produtos->where('category_id','=', $request->category_id );
        }

        return view('produto.index')->with(['produtos' => $produtos->paginate(5), 'categories'=>Category::all()]);
    }

}
