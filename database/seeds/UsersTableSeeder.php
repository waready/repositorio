<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'name' => 'hola',
            'email' => 'hola@mail.com',
            'password' =>   bcrypt('123456')
        ]);
        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@mail.com',
            'password' =>   bcrypt('123456')
        ]);
        User::create([
            'name' => 'Jose',
            'email' => 'jose@mail.com',
            'password' =>   bcrypt('123456')
        ]);
        
    }
}
