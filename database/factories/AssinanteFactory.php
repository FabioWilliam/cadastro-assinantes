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
    $data_nascimento = rand(1,28) . '/' . rand(1,12) . '/' . (date('Y') - rand(18,80));
    $sexo = $faker->randomElement(['M', 'F']);
    $firstname = ($sexo == 'F') ? $faker->firstNameFemale : $faker->firstNameMale;

    return [
        'nome' => $firstname . ' ' . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'senha' => $password,
        'confirma_senha' => $password,
        'cpf' => $faker->cpf,
        'sexo'=> $sexo,
        'data_nascimento' => $data_nascimento,
        'cep' => $faker->postcode,
        'tipo_logradouro' => $faker->randomElement(['R', 'AV', 'AL', 'Q', 'RES', 'OUTROS']),
        'logradouro' => $faker->streetName,
        'numero' => $faker->randomElement([$numero, $numero, $numero, 'SN']),
        'complemento' => $faker->randomElement([$secondaryAddress, null]),
        'bairro' => $faker->randomElement(['Cocaia', 'Sadokin', 'Lauzanne', 'Lapa', 'Perdizes', 'Barra Funda', 'Interlagos', 'Alphaville', 'Cerqueira César']),
        'cidade' => $faker->city,
        'telefone' => $faker->cellphoneNumber,
        'interesses' => $chosenInteresses,
        'estado' => $faker->stateAbbr(),
        'aceita_receber_informacoes' => $faker->randomElement([true, false]),
        'outras_informacoes' => $faker->randomElement([$text, null]),
    ];
});
