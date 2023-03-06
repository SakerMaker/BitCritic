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
        $saker=User::create(['name'=>"Saker",'email'=>"sakermaker@gmail.com",'password'=>Hash::make("adminXDXD"),'location'=>"Murcia",'profile_photo_path'=>'img/profileDefault.png','banner_photo_path'=>'img/bannerDefault.png', 'about_you'=>"Illo keloke"]);
        $victor=User::create(['name'=>"Víctor",'email'=>"victor@gmail.com",'password'=>Hash::make("adminXDXD"),'location'=>"Italia",'profile_photo_path'=>'img/profileDefault.png','banner_photo_path'=>'img/bannerDefault.png', 'about_you'=>"besto di pesto"]);
        $saker->assignRole('Admin');
        $victor->assignRole('Admin');
        $usuarios=User::factory(50)->create();
        for($i=0;$i<count($usuarios);$i++){
            $usuarios[$i]->assignRole('User');
        }
    }
}
