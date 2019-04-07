<?php

use App\Assinante;
use App\Revista;
use App\Repository\ListasRepository;
use Faker\Generator as Faker;

$factory->define(App\Assinatura::class, function (Faker $faker) {
    $listasRepository = new ListasRepository();
    $revista = factory(App\Revista::class)->create();
    return [
        'revista_id' => $revista->id,
        'assinante_id' => function () {
            return factory(App\Assinante::class)->create()->id;
        },
        'status' => $faker->randomElement($listasRepository->getStatusAssinatura()),
        'ip' => $faker->ipv4,
    ];
});
