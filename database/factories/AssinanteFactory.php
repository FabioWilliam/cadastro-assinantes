<?php

use Faker\Generator as Faker;

$factory->define(App\Assinante::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'senha' => $faker->password,
        'confirma_senha' => $faker->password,
        'cpf' => $faker=->cpf,

        'email_verified_at' => now(),
// +----------------------------+------------------+------+-----+---------+----------------+
// | Field                      | Type             | Null | Key | Default | Extra          |
// +----------------------------+------------------+------+-----+---------+----------------+
// | id                         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | nome                       | varchar(50)      | NO   |     | NULL    |                |
// | senha                      | varchar(60)      | NO   |     | NULL    |                |
// | confirma_senha             | varchar(60)      | NO   |     | NULL    |                |
// | cpf                        | varchar(14)      | NO   |     | NULL    |                |
// | sexo                       | varchar(1)       | NO   |     | NULL    |                |
// | data_nascimento            | date             | NO   |     | NULL    |                |
// | cep                        | varchar(9)       | NO   |     | NULL    |                |
// | tipo_logradouro            | varchar(10)      | NO   |     | NULL    |                |
// | logradouro                 | varchar(60)      | NO   |     | NULL    |                |
// | numero                     | varchar(6)       | NO   |     | NULL    |                |
// | complemento                | varchar(20)      | YES  |     | NULL    |                |
// | bairro                     | varchar(60)      | NO   |     | NULL    |                |
// | telefone                   | varchar(15)      | NO   |     | NULL    |                |
// | interesses                 | varchar(250)     | NO   |     | NULL    |                |
// | aceita_receber_informacoes | varchar(1)       | NO   |     | NULL    |                |
// | outras_informacoes         | text             | YES  |     | NULL    |                |
// | created_at                 | timestamp        | YES  |     | NULL    |                |
// | updated_at                 | timestamp        | YES  |     | NULL    |                |
// +----------------------------+------------------+------+-----+---------+----------------+


    ];
});
