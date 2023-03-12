<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


          User::create([
            'name' => 'Administrador Unico',
            'email' => 'admin@a.a',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

    
        $this->call([
            RoleSeeder::class,     //se crean los dos tipos de roles
            RoleUserSeeder::class, //se asigna el rol de administrador al primer usuario creado
        ]);


        // se crean los demas usuarios
        \App\Models\User::factory(14)->create();

        //Se asigna el rol de usuario al resto de los usuarios
        $users= User::select('id')->where('id','!=',1)->get();

        foreach ($users as $user){
            RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 2,
             ]);

        }
       
    }


    
}
