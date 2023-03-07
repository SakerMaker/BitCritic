<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de 50 cabros(contraseña="jejejeje") y 1 admin(contraseña="adminXDXD")
        // $usuarios=User::factory(50)->create();
        // for($i=0;$i<count($usuarios);$i++){
        //     $usuarios[$i]->assignRole('User');
        // }
    }
}
