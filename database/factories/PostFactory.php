<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        // creamos los datos de prueba
        'user_id' => 1, # creamos el user_id en la tabla user
        'title'   => $faker->sentence, # creamos los titulos de prueba
        'body'    => $faker->text(800), # creamos texto de 800 caracteres
    ];
});
