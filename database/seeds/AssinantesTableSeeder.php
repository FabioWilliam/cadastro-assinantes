<?php

use Illuminate\Database\Seeder;
use App\Assinante;

class AssinantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Assinante::class, 100)->create();
    }
}
