<?php

use Faker\Generator as Faker;
$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Revista::class, function (Faker $faker) {
    $seed0 = ['DEVO', 'NÃO DEVO', 'QUERO', 'AGORA', 'JA', 'POSSO', 'COMO'];
    $seed1 = ['ABRIR', 'BEIJAR','CANTAR', 'DANCAR', 'ELEVAR', 'FALAR', 'GRITAR', 'TRITURAR'];
    $seed2 = ['OLHOS', 'NARIZ', 'MINHA BOCA', 'SUA TV', 'NOSSO SOFA', 'A PORTA', 'NOSSA CASA', 'O SEU JARDIM', 'O COMPUTADOR'];
    $titulo = $faker->randomElement($seed0) . ' ' . $faker->randomElement($seed1) . ' ' .$faker->randomElement($seed2);
    $itens = explode(" ",$titulo);
    $codigo = substr($itens[0],0,1) . substr($itens[1],0,1) . substr($itens[2],0,1);
    $capas = ['bicycling.png', 'dinheiro-rural.png', 'go-outside.png', 'hardcore.png',
                'istoe-dinheiro.png', 'istoe.png', 'menu.png', 'motor-show.png', 'planeta.png',
                'runners-world.png', 'select.png', 'womens-health.png'];
    $assuntos = ['economia', 'agronomia', 'meio ambiente', 'moda', 'gastronomia', 'carro', 'esportes'];
    $url = $faker->url;
    if (strlen($url) > 60) {
        $url = substr($url,0,55) . '.com';
    }
    return [
        'titulo' => $titulo,
        'codigo' => $codigo,
        'descricao' => $faker->text($maxNbChars = 200),
        'formato' => $faker->randomElement(['I','D']),
        'valor' => $faker->numberBetween(500,3000)/100,
        'vigencia' => $faker->randomElement(['6 meses', '1 ano', '2 ano']),
        'site' => $url,
        'participa_de_promocao' => $faker->randomElement([true,false]),
        'assuntos' => $faker->randomElements($assuntos,2),
        'observacoes' => $faker->text($maxNbChars = 200),
        'capa' => $faker->randomElement($capas),
    ];
});
