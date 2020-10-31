<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            # campos para nuestro blog 
            # relacion con tabla usuarios
            $table->bigInteger('user_id')->unsigned();
            # titulo del post
            $table->string('title');
            # usamos el paquete slug para las urls casteando el titulo del post
            $table->string('slug')->unique();
            # agregamos una imagen
            $table->string('image')->nullable();
            # cuerpo del post
            $table->text('body');
            # contenido embebido (video u otros)
            $table->text('iframe')->nullable();
            $table->timestamps();
            # tipo de relacion, campo a usar y tabla
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
