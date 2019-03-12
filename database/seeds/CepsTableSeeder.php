<?php

use Illuminate\Database\Seeder;
use App\Cep;

class CepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cep::class, 20)->create();
    }
}
