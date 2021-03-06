<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ds_cpf', 'ds_celular', 'ds_endereco', 'ds_numero', 'ds_cep', 'ds_cidade','ds_uf'];
    protected $table = 'tb_cliente';

    public function usuario(){
        return User::where('id','=',$this->user_id)->orderByRaw('created_at DESC')->first();
    }

    public static function ult10Clientes(){
        return Cliente::all()->sortBy('created_at')->take(10);
    }
}
