<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTbProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->id();
            $table->string('ds_nome');
            $table->string('ds_descricao');
            $table->biginteger('fk_categoria')->unsigned();
            $table->biginteger('fk_tagproduto')->unsigned();
            $table->integer('tg_inativo')->default(0);
            $table->double('vl_produto',12,4);
            $table->integer('qt_estoque');
            $table->integer('qt_estoquemin');
            $table->integer('qt_estoquemax');
            $table->string('hx_foto1')->default('');
            $table->string('hx_foto2')->default('');
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
        Schema::dropIfExists('tb_produto');
    }
}
