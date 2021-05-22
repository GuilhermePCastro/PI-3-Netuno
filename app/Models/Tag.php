<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['tag_nome' ];

    protected $table = 'tb_tag';

    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }

    public static function quantidadesProdutos($id){
        $produtos = DB::table('produto_tag')->where('tag_id', '=' , $id)->get();
        $total = 0;

        foreach($produtos as $item){
            if($item->produto_id)
            $total += 1;
        }

        return $total;
    }
}
