<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnderecoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string("endereco",255)->default(0);
            $table->unsignedInteger("numero")->default(0);
            $table->string("bairro",255)->default(0);
            $table->string("cep",30)->default(0);
            $table->string("cidade",255)->default(0);
            $table->enum("estado",[
                "AC","AL","AP","AM","BA","CE","DF","ES","GO",
                "MA","MT","MS","MG","PA","PB","PR","PE","PI",
                "RJ","RN","RS","RO","RR","SC","SP","SE","TO"
                ])->default('');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('endereco');
            $table->dropColumn('numero');
            $table->dropColumn('bairro');
            $table->dropColumn('cep');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
            //
        });
    }
}
