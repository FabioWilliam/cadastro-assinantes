<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\AssinaturasTableSeeder::class);
        $this->call(\AssinantesTableSeeder::class);
        $this->call(\CepsTableSeeder::class);
        $this->call(\RevistasTableSeeder::class);
    }
}
