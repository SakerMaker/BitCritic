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
        $admin=User::create(['name'=>"admin",'email'=>"admin@gmail.com",'password'=>Hash::make("adminXDXD"),'profile_photo_path'=>'/xd/xd.png', 'about_you'=>"besto di pesto"]);
        $admin->assignRole('Admin');
        User::factory(50)->create();
    }
}
