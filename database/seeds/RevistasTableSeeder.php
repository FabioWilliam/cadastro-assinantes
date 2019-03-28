<?php

use App\Revista;
use Illuminate\Database\Seeder;

class RevistasTableSeeder extends Seeder
{
    public function run()
    {
        factory(Revista::class, 15)->create();
    }
}
