<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'id', 'ds_nome', 'ds_descricao', 'category_id', 'fk_tagproduto',
                            'vl_produto', 'qt_estoque', 'qt_estoquemin', 'qt_estoquemax', 'hx_foto1', 'hx_foto2'];

    //
    protected $table = 'tb_produto';

    public function category(){
        return $this->belongsTo(Category::class);

    }
}
