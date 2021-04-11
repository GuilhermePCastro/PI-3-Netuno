<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['tag_nome' ];

    protected $table = 'tb_tag';

    public function products(){
        return $this->belongsToMany(Produto::class);
    }
}
