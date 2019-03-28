<?php

use App\Assinante;
use App\Revista;
use Faker\Generator as Faker;

$factory->define(App\Assinatura::class, function (Faker $faker) {
    $revista = factory(App\Revista::class)->create();
    return [
        'revista_id' => $revista->id,
        'assinante_id' => function () {
            return factory(App\Assinante::class)->create()->id;
        },
        'valor' => str_replace(',', '.', $revista->valor),
        'status' => $faker->randomElement(['A', 'C', 'P']),
        'data_assinatura' => $faker->dateTime(),
        'ip' => $faker->ipv4,
    ];
});
