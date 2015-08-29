<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('detail_id');
            $table->integer('detail_perfil_id')->unsigned();;
            $table->text('detail_bio');
            $table->string('detail_avatar');
            $table->string('detail_twitter');
            $table->string('detail_facebook');
            $table->string('detail_google_plus');
            $table->string('detail_instagram');
            $table->string('detail_youtube');
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
        Schema::drop('details');
    }
}
