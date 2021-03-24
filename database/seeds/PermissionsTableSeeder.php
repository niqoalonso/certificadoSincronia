<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
       //Administador
    Permission::create([
        'name' =>           'Navegar Alumnos',
        'slug' =>           'alumno.index',
        'description' =>    'Gestionar todos los alumnos del sistema.',
    ]);

    Permission::create([
        'name' =>           'Navegar Capacitaciones',
        'slug' =>           'capacitacion.index',
        'description' =>    'Gestionar todos las capacitaciones del sistema.',
    ]);

    Permission::create([
        'name' =>           'Navegar Certificados',
        'slug' =>           'certificado.index',
        'description' =>    'Gestionar todos los certificados del sistema.',
    ]);


    //Alumnos

    Permission::create([
        'name' =>           'Navegar Perfil',
        'slug' =>           'perfil.index',
        'description' =>    'Gestionar perfil alumnos.',
    ]);

    Permission::create([
        'name' =>           'Navegar Certificados Alumno',
        'slug' =>           'certificadoalumno.index',
        'description' =>    'Gestionar todos los certificados del alumno.',
    ]);

    //GLOBALES

    Permission::create([
        'name' =>           'Descargar Certificados',
        'slug' =>           'dowloader.certificado',
        'description' =>    'Descarga de certificados.',
    ]);

    Permission::create([
        'name' =>           'Gestion Solicitud Certificados',
        'slug' =>           'solicitud.index',
        'description' =>    'Gestionar todas las solicitudes certificados del sistema.',
    ]);


        DB::table('permission_role')->insert(['permission_id'=>1,'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id'=>2,'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id'=>3,'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id'=>6,'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id'=>7,'role_id'=>1]);

        DB::table('permission_role')->insert(['permission_id'=>4,'role_id'=>2]);
        DB::table('permission_role')->insert(['permission_id'=>5,'role_id'=>2]);
        DB::table('permission_role')->insert(['permission_id'=>6,'role_id'=>2]);

        DB::table('alumno_role')->insert(['role_id'=>1,'alumno_id'=>1]);
        DB::table('alumno_role')->insert(['role_id'=>1,'alumno_id'=>2]);
        DB::table('alumno_role')->insert(['role_id'=>1,'alumno_id'=>3]);

    }
}
