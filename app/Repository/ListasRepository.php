<?php

namespace App\Repository;

class ListasRepository {

    public function getStatusAssinatura()
    {
        return [
            'Aguardando Pagamento' => 'Aguardando Pagamento',
            'Pago' => 'Pago',
            'Cancelada' => 'Cancelada'];
    }

    public function getAssuntosList()
    {
        return [
            'economia' => 'Economia',
            'agronomia' => 'Agronomia',
            'meio ambiente' => 'Meio ambiente',
            'moda' => 'Moda',
            'gastronomia' => 'Gastronomia',
            'carro' => 'Carro',
            'esportes' => 'Esportes',
        ];
    }
    public function getVigenciaList()
    {
        return [
            '6 meses' => '6 meses',
            '1 ano' => '1 ano',
            '2 anos' => '2 anos',
            '5 anos' => '5 anos',
        ];
    }

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

    public function getTipoLogradouroList()
    {
        return [
            'R' => 'Rua',
            'AV' => 'Avenida',
            'AL' => 'Alameda',
            'Q' => 'Quadra',
            'RES' => 'Residencial',
            'OUTROS' => 'Outros',
        ];
    }

    public function getEstadosList()
    {
        return [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
            'EX' => 'Estrangeiro',
        ];
    }

    public function getSiglasList()
    {
        return [
        'AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT',
        'MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR',
        'SC','SP','SE','TO','EX'];
    }

}
