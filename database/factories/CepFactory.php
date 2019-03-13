<?php

use Faker\Generator as Faker;
use App\Repository\ListasRepository;

$factory->define(App\Cep::class, function (Faker $faker) {
    $listasRepository = new ListasRepository();
    return [
        'cep' => $faker->numberBetween(100000, 999999) * 100,
        'tipo_logradouro' => $faker->randomElement(['R', 'AV', 'AL', 'Q', 'RES', 'OUTROS']),
        'logradouro' => $faker->streetName,
        'bairro' => $faker->randomElement(['Cocaia', 'Sadokin', 'Lauzanne', 'Lapa', 'Perdizes', 'Barra Funda', 'Interlagos', 'Alphaville', 'Cerqueira César']),
        'cidade' => $faker->city,
        'estado' => $faker->randomElement($listasRepository->getSiglasList()),
    ];
});
