<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function add(Request $request){

        //Pegando o carrinho
        $carrinho = Carrinho::where('user_id', '=', Auth()->user()->id)->get();

        //Criar o pedido
        $pedido = Pedido::create([
            'user_id' => Auth()->user()->id,
            'status' => 'Em aberto',
            'endereco_id' => $endereco->id,
            'cd_cartao' => substr($request->'nome do campo do cartão',-4),
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

        return redirect(route('pedido.show'));
    }

    public function show(){
        return view('pedido.show');
    }
}
