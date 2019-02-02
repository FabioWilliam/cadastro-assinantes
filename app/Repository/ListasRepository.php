<?php

namespace App\Repository;

class ListasRepository {

    public function getInteressesList()
    {
        return [
            'leitura' => 'Leitura',
            'esporte' => 'Esporte',
            'academia' => 'Academia',
            'teatro' => 'Teatro',
            'ioga' => 'Ioga',
            'cinema' => 'Cinema',
            'dança' => 'Dança',
            'televisão' => 'Televisão',
            'jogos' => 'Jogos',
            'carros' => 'Carros',
        ];
    }
}
