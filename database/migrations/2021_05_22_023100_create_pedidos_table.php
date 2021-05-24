<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pedido', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ds_status');
            $table->integer('cliente_id');
            $table->string('ds_endereco');
            $table->string('ds_numero');
            $table->string('ds_cep');
            $table->string('ds_cidade');
            $table->string('ds_uf');
            $table->string('cd_cartao');
            $table->double('vl_total',12,4);
            $table->double('vl_parcela',12,4);
            $table->integer('nr_parcela');
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
        Schema::dropIfExists('tb_pedido');
    }
}
