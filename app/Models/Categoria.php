<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['id','cat_nome', 'cat_descricao'];

    //'hx_foto1', 'hx_foto2' 'tg_inativo',
    protected $table = 'tb_categoria';
}
