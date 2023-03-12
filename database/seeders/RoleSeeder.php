<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rolAdministrador = Role::create(['name' => 'Administrador', 'slug'=>'admin', 'description'=>now()]);
        $rolUsuario = Role::create(['name' => 'Usuario', 'slug'=>'user', 'description'=>now()]);
    }
}
