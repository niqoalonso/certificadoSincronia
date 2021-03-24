<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
       /* ADMINISTRADOR */
       Role::create([
        'name'          => 'Administrador',
        'slug'          => 'useradmin',
        'description'   => 'Gestionar de todos los modulos de administrador.',
        ]);

        /* ALL-ACCESS */
        Role::create([
            'name'          => 'Alumno',
            'slug'          => 'useralumno',
            'description'   => 'Gestionar sus certificados y perfil de alumno.',
        ]);

    }
}
