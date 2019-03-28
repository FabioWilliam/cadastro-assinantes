<?php

use App\Assinante;
use Illuminate\Database\Seeder;

class AssinantesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Assinante::class, 10)->create();
    }
}
