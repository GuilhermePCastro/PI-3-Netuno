<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Cliente;

class CarrinhoController extends Controller
{
    public function add(Produto $produto){

        //Verificando se já existe o item e o usuário no carrinho
       $item = Carrinho::where([
                                ['produto_id', '=', $produto->id],
                                ['user_id', '=', Auth()->user()->id],
                               ])->first();

       if($item){

            //Adicionando a quantidade do item
            $item->update([
                'qt_produto' => $item->qt_produto + 1
            ]);
            session() -> flash('success', 'Produto adicionado!');
            return redirect()->back();

       }else{

            //Adicionando no carrinho o produto
            Carrinho::create([

                //Função para verificar qual é o usuário
                'user_id'       => Auth()->user()->id,
                'produto_id'    => $produto->id,
                'qt_produto'      => 1

            ]);

            session() -> flash('success', 'Produto adicionado!');
            return redirect()->back();

        }
    }

    public function remove(Produto $produto){

       //Verificando se já existe o item e o usuário no carrinho
       $item = Carrinho::where([
                    ['produto_id', '=', $produto->id],
                    ['user_id', '=', Auth()->user()->id],
                ])->first();

       if($item->qt_produto > 1){

            //removendo a quandidade do item
            $item->update([
                'qt_produto' => $item->qt_produto - 1
            ]);
            session() -> flash('success', 'Produto removido!');
            return redirect()->back();

       }else{

            //Deletando o item do carrinho
            $item->delete();
            session() -> flash('success', 'Produto removido!');
            return redirect()->back();

        }
    }

    public function show(){

        $carrinho = Carrinho::where('user_id', '=' , Auth()->user()->id)->get();
        return view('carrinho.show')->with('carrinho', $carrinho);

    }

    public function pagamento(){
        $carrinho = Carrinho::where('user_id', '=' , Auth()->user()->id)->get();
        $cliente = Cliente::where('user_id', '=', Auth()->user()->id)->first();

        return view('carrinho.pagamento')->with(['carrinho' => $carrinho, 'cliente' => $cliente]);
    }

}
