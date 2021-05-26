<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id','produto_id', 'qt_produto', 'vl_produto'];
    protected $table = 'tb_pedidoitens';

    public function produto(){
        return produto::where('id','=', $this->produto_id)->first();
    }
}
