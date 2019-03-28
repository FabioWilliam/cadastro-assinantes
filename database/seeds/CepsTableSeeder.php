<?php

use App\Cep;
use Illuminate\Database\Seeder;

class CepsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Cep::class, 20)->create();
    }
}
