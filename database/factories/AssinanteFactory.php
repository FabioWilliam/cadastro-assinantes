<?php

use Faker\Generator as Faker;
$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Assinante::class, function () use ($faker) {
    $password = $faker->password;
    $numberOfInteresses = $faker->numberBetween(3, 10);
    $listOfInteresses = ['leitura', 'esporte', 'academia', 'teatro',
        'ioga', 'cinema', 'dança', 'televisão', 'jogos', 'carros'];
    $chosenInteresses = $faker->randomElements($listOfInteresses, $numberOfInteresses);
    $secondaryAddress = $faker->secondaryAddress();
    $text = $faker->text(500);
    $numero = $faker->buildingNumber;
    $sexo = $faker->randomElement(['M', 'F']);
    $firstname = ($sexo == 'F') ? $faker->firstNameFemale : $faker->firstNameMale;

    return [
        'nome' => $firstname.' '.$faker->lastName,
        'email' => $faker->safeEmail,
        'senha' => $password,
        'confirma_senha' => $password,
        'cpf' => $faker->cpf,
        'sexo'=> $sexo,
        'data_nascimento' => $faker->date(),
        'cep' => $faker->postcode,
        'tipo_logradouro' => $faker->streetPrefix,
        'logradouro' => $faker->streetName,
        'numero' => $faker->randomElement([$numero,$numero,$numero,'SN']),
        'complemento' => $faker->randomElement([$secondaryAddress,null]),
        'bairro' => $faker->randomElement(['Cocaia', 'Sadokin', 'Lauzanne', 'Lapa', 'Perdizes', 'Barra Funda', 'Interlagos', 'Alphaville', 'Cerqueira César']),
        'telefone' => $faker->cellphoneNumber,
        'interesses' => implode(',', $chosenInteresses),
        'estado' => $faker->stateAbbr(),
        'aceita_receber_informacoes' => $faker->randomElement([true,false]),
        'outras_informacoes' => $faker->randomElement([$text,null]),
    ];
});
