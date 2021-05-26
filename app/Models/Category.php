<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','cate_nome', 'cate_descricao'];

    protected $table = 'tb_category';

    public function produtos(){
        return $this->hasMany(Produto::class);
    }

    public static function quantidadesProdutos($id){
        $produtos = Produto::where('category_id', '=', $id)->get();
        $total = 0;

        foreach($produtos as $item){
            if($item->id)
            $total += 1;
        }

        return $total;
    }

}
