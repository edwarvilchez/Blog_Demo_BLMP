<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        # creamos nuestro usuario para las pruebas
        App\User::create([
	        'name' => 'edwar vilchez',
	        'email' => 'edwarv@gmail.com',
	        'password' => bcrypt('123456')
        ]);

        # creamos los posts
        factory(App\Post::class, 24)->create();
    }
}
