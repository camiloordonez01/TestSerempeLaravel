<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Pruebas','email' => 'pruebas@mail.com', 'password' => Hash::make('12345678')],
        ]);
        DB::table('cities')->insert([
            ['id' => '1','cod' => '1','name' => 'MEDELLIN'],
            ['id' => '2','cod' => '2','name' => 'ABEJORRAL'],
            ['id' => '3','cod' => '4','name' => 'ABRIAQUI'],
            ['id' => '4','cod' => '21','name' => 'ALEJANDRIA'],
            ['id' => '5','cod' => '30','name' => 'AMAGA'],
            ['id' => '6','cod' => '31','name' => 'AMALFI'],
            ['id' => '7','cod' => '34','name' => 'ANDES'],
            ['id' => '8','cod' => '36','name' => 'ANGELOPOLIS'],
            ['id' => '9','cod' => '38','name' => 'ANGOSTURA']
          ]);
        
        DB::table('client')->insert([
            ['cod' => '1', 'name' => 'Juan Camilo Ordoñez', 'cities_id' =>'1'],
        ]);
    }
}
