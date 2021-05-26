<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ds_status', 'cliente_id', 'ds_endereco', 'ds_numero', 'ds_cep', 'ds_cidade','ds_estado', 'vl_total', 'vl_parcela', 'nr_parcela'];
    protected $table = 'tb_pedido';

    public function itens(){
        return PedidoItem::where('pedido_id','=', $this->id)->get();
    }
}
