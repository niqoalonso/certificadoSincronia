<?php

use Illuminate\Database\Seeder;
use App\Alumno;
use Illuminate\Support\Facades\Hash;

class AlumnosTableSeeder extends Seeder
{

    public function run()
    {
        Alumno::create([
            'rut'       =>    '19088963-7',
            'email'     =>    'niqo.alonso@gmail.com',
            'nombres'   =>    'Nicolas Antonio',
            'apellidos' =>      'Alonso Olate',
            'celular'   =>     '68980215',
            'password'  =>      Hash::make('admin.cento2020'),
        ]);

        Alumno::create([
            'rut'       =>    '16767670-7',
            'email'     =>    'fopazo@sincronialtda.cl',
            'nombres'   =>    'Fernanda Paola',
            'apellidos' =>     'Opazo Rivera',
            'celular'   =>     '50412451',
            'password'  =>      Hash::make('admin.sincronia2021'),
        ]);

        Alumno::create([
            'rut'       =>    '76001542-3',
            'email'     =>    'dramirez@sincronialtda.cl',
            'nombres'   =>    'Danilo',
            'apellidos' =>     'Ramirez',
            'celular'   =>     '73375951',
            'password'  =>      Hash::make('admin.sincronia2021'),
        ]);
    }
}
