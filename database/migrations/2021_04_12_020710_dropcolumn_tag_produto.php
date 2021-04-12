<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropcolumnTagProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_produto', function (Blueprint $table) {
            $table->dropColumn('fk_tagproduto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_produto', function (Blueprint $table) {
            $table->biginteger('fk_tagproduto')->unsigned();
        });
    }
}
