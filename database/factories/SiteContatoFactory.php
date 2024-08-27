<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

class SiteContatoFactory extends Factory
{
    protected $model = SiteContato::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'telefone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'motivo_contato' => $this->faker->numberBetween(1, 3),
            'mensagem' => $this->faker->paragraph,
        ];
    }
}
