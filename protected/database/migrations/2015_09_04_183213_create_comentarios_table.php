<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('com_id');     
            $table->string('com_nome', 70);
            $table->string('com_email', 150);
            $table->string('com_site', 150);
            $table->text('com_texto');
            $table->integer('com_id_post')->unsigned();
            $table->integer('com_id_res')->unsigned();
            $table->integer('com_status')->unsigned();
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
        Schema::drop('comentarios');
    }
}
