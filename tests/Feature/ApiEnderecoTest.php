<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiEnderecoTest extends TestCase
{
    public function testApiSuccess()
    {
        $response = $this->withHeaders([
            'X-Token' => config('api.token')
        ])->json('GET', '/api/endereco/37117600');

        $response->assertStatus(200);
        $response->assertExactJson([
            'success' => true,
            'data' => [
                'cep'             => '37117600',
                'tipo_logradouro' => 'OUTROS',
                'logradouro'      => 'Wisoky Corner',
                'bairro'          => 'Cocaia',
                'cidade'          => 'Herzogfurt',
                'estado'          => 'RS'
            ]
        ]);
    }

    public function testApiAuthenticationFailed()
    {
        $invalidToken = 'fi8rpcjv8652nvg7u0f73fh4tr2hphna';

        $response = $this->withHeaders([
            'X-Token' => $invalidToken
            ])->json('GET', '/api/endereco/37117600');
        $response->assertStatus(401);
    }

    public function testApiResourceNotFound()
    {
        $invalidCep = '99999999';

        $response = $this->withHeaders([
            'X-Token' => config('api.token')
        ])->json('GET', '/api/endereco/' . $invalidCep);

        $response->assertStatus(404);
    }
}
