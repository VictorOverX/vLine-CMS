<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_titulo');
            $table->date('post_data');
            $table->integer('post_categoria_id')->unsigned();
            $table->integer('post_autor')->unsigned();
            $table->string('post_tags');
            $table->text('post_conteudo');            
            $table->string('post_capa');
            $table->text('post_video');
            $table->string('post_status', 20);
            $table->string('post_slug');
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
        Schema::drop('posts');
    }
}
