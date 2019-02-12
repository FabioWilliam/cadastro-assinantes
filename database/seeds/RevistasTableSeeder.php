<?php

use Illuminate\Database\Seeder;
use App\Revista;

class RevistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Revista::class, 15)->create();
    }
}
