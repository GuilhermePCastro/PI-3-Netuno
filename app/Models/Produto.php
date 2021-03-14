<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [ 'pk_id', 'ds_nome', 'ds_descricao', 'fk_categoria', 'fk_tagproduto',
                            'tg_inativo', 'vl_produto', 'qt_estoque', 'qt_estoquemin', 'qt_estoquemax', 'hx_foto1', 'hx_foto2'];
    protected $primaryKey = 'pk_id';
    protected $table = 'tb_produto';
}
