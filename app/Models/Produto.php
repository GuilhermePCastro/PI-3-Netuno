<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'id', 'ds_nome', 'ds_descricao', 'category_id',
                            'vl_produto', 'qt_estoque', 'qt_estoquemin', 'qt_estoquemax', 'hx_foto1'];

    //
    protected $table = 'tb_produto';

    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public static function ultProdutos(){
        return Produto::where('qt_estoque','>','0')->OrderBy('created_at','desc')->take(4)->get();
    }
}
