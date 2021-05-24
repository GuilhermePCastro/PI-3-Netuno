<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ds_cpf');
            $table->string('ds_celular');
            $table->string('ds_endereco');
            $table->string('ds_numero');
            $table->string('ds_cep');
            $table->string('ds_cidade');
            $table->string('ds_uf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cliente');
    }
}
