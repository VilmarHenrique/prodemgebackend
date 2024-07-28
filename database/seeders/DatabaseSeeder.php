<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(PessoaSeeder::class);
        
        $pessoaIds = \App\Models\Pessoa::pluck('id')->toArray();
       
        if (empty($pessoaIds)) {
            throw new \Exception('Nenhum ID de pessoa foi encontrado. Verifique o seeder de pessoas.');
        } else {
            echo "Pessoa IDs: " . implode(", ", $pessoaIds) . "\n";
        }

        echo "Chamando o seeder de endereços com IDs: " . implode(", ", $pessoaIds) . "\n";

        $this->callWith(EnderecoSeeder::class, ['pessoaIds' => $pessoaIds]);
        
        echo "Seeder de endereços chamado com sucesso.\n";
    }
}
