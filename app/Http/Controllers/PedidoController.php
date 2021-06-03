<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function add(Request $request){

        //Pegando o carrinho
        $carrinho = Carrinho::where('user_id', '=', Auth()->user()->id)->get();
        $cliente = Cliente::where('user_id', '=', Auth()->user()->id)->first();

        //Criar o pedido
        $pedido = Pedido::create([
            'user_id' => Auth()->user()->id,
            'ds_status' => 'Em aberto',
            'cliente_id' => $cliente->id,
            'ds_endereco' => $request->ds_endereco,
            'ds_numero' => $request->ds_numero,
            'ds_cep' => $request->ds_cep,
            'ds_cidade' => $request->ds_cidade,
            'ds_uf' => $request->ds_uf,
            'cd_cartao' => substr($request->nr_cartao,-4),
            'vl_total' => $request->vl_total,
            'nr_parcela' => $request->nr_parcela,
            'vl_parcela' => $request->vl_total/$request->nr_parcela,
        ]);

        foreach($carrinho as $item){
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item->produto_id,
                'qt_produto' => $item->qt_produto,
                'vl_produto' => $item->produto()->vl_produto,
            ]);

            $item->delete();
        }

        return redirect(route('pedido.sucesso',$pedido));
    }

    public function show(Pedido $pedido){
        return view('pedido.show')->with(['pedido' => $pedido, 'itens' => $pedido->itens()]);
    }

    public function update(Request $request, Pedido $pedido){

        $pedido->update([
            'ds_status' => $request->ds_status,
        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Pedido $pedido->id foi atualziado com sucesso!");
        return redirect(route('pedido.index'));
    }

    public function index(){
        return view('pedido.index')->with(['pedidos'=>Pedido::paginate(5)]);
    }

    public function filtro(Request $request){
        $pedidos = Pedido::where('id', '>', '0');

        if($request->codigo != ''){
            $pedidos = $pedidos->where('id','=', $request->codigo );
        }

        if($request->cpf != ''){
            $cliente = Cliente::where('ds_cpf','=', $request->cpf)->first();
            $produtos = $produtos->where('cliente_id','=', $cliente->id );
        }

        return view('pedido.index')->with(['produtos' => $produtos->paginate(5), 'categories'=>Category::all()]);
    }

    public function sucesso(Pedido $pedido){
        return view('carrinho.sucesso')->with('pedido', $pedido);
    }

}
