<?php

use App\Assinatura;
use Illuminate\Database\Seeder;

class AssinaturasTableSeeder extends Seeder
{
    public function run()
    {
        factory(Assinatura::class, 20)->create();
    }
}
