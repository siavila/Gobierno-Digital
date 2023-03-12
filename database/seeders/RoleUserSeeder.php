<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RoleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                //se asigna el rol de administrador al usuario admin
        RoleUser::create([
            'user_id' => '1',
            'role_id' => '1',
        ]);
    }
}
