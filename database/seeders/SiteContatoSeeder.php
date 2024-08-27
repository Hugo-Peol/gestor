<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria um registro específico
        SiteContato::create([
            'nome' => 'Sistema SG',
            'telefone' => '(11) 99999-8888',
            'email' => 'contato@sg.com.br',
            'motivo_contato' => 1,
            'mensagem' => 'Seja bem-vindo ao sistema Super Gestão',
        ]);

        // Cria 100 registros usando a fábrica
        SiteContato::factory()->count(100)->create();
    }
}
