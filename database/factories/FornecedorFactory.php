<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'site' => $this->faker->url,
            'uf' => $this->faker->stateAbbr,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
