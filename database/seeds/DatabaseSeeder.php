<?php

use Illuminate\Database\Seeder;
use App\Capacitacion;

class DatabaseSeeder extends Seeder
{

    public function run()
    {   
        $this->call(AlumnosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);


    }
}
