<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pessoa::create([
            'nome' => 'João Silva',
            'nome_social' => 'Joãozinho',
            'cpf' => '12345678901',
            'nome_pai' => 'Carlos Silva',
            'nome_mae' => 'Maria Silva',
            'telefone' => '1234567890',
            'email' => 'joao.silva@example.com',
        ]);

        Pessoa::create([
            'nome' => 'Maria Souza',
            'nome_social' => 'Mariazinha',
            'cpf' => '23456789012',
            'nome_pai' => 'José Souza',
            'nome_mae' => 'Ana Souza',
            'telefone' => '0987654321',
            'email' => 'maria.souza@example.com',
        ]);
    }
}
