<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($params = [])
    {
        if (!isset($params['pessoaIds'])) {
            throw new \Exception('Os IDs das pessoas não foram passados para o seeder de endereços.');
        }

        $pessoaIds = $params['pessoaIds'];
       
        echo "Pessoa IDs recebidos no EnderecoSeeder: " . implode(", ", $pessoaIds) . "\n";

        Endereco::create([
            'pessoa_id' => $pessoaIds[0],
            'tipo' => 'residencial',
            'cep' => '12345678',
            'logradouro' => 'Rua A',
            'numero' => '100',
            'complemento' => 'Apto 1',
            'bairro' => 'Bairro A',
            'estado' => 'MG',
            'cidade' => 'Cidade A',
        ]);

        Endereco::create([
            'pessoa_id' => $pessoaIds[0],
            'tipo' => 'comercial',
            'cep' => '87654321',
            'logradouro' => 'Rua B',
            'numero' => '200',
            'complemento' => 'Sala 2',
            'bairro' => 'Bairro B',
            'estado' => 'MG',
            'cidade' => 'Cidade B',
        ]);

        Endereco::create([
            'pessoa_id' => $pessoaIds[1],
            'tipo' => 'residencial',
            'cep' => '23456789',
            'logradouro' => 'Rua C',
            'numero' => '300',
            'complemento' => 'Casa',
            'bairro' => 'Bairro C',
            'estado' => 'SP',
            'cidade' => 'Cidade C',
        ]);
    }
}
