<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ds_status', 'cliente_id', 'ds_endereco', 'ds_numero', 'ds_cep', 'ds_cidade','ds_uf', 'vl_total', 'cd_cartao', 'vl_parcela', 'nr_parcela'];
    protected $table = 'tb_pedido';

    public function itens(){
        return PedidoItem::where('pedido_id','=', $this->id)->get();
    }

    public function cliente(){
        return Cliente::where('user_id','=', $this->user_id)->first();
    }

    public function usuario(){
        return User::where('id','=', $this->user_id)->first();
    }

    public static function ult5pedidos(){
        return Pedido::all()->sortByDesc('created_at')->take(5);
    }
}
