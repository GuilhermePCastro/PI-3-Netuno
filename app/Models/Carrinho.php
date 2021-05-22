<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','produto_id', 'qt_produto'];

    protected $table = 'tb_carrinho';

    public function produto(){
        return Produto::where('id', '=', $this->produto_id)->first();
    }

    public static function quantidade(){
        $carrinho = Carrinho::where('user_id', '=', Auth()->user()->id)->get();
        $total = 0;

        foreach($carrinho as $item){
            $total += $item->qt_produto;
        }

        return $total;
    }

    public static function totalCarrinho(){
        $carrinho = Carrinho::where('user_id', '=', Auth()->user()->id)->get();
        $total = 0;

        foreach($carrinho as $item){
            $total += $item->produto()->vl_produto * $item->qt_produto;
        }

        return $total;
    }
}
