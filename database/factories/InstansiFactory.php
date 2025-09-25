<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instansi;

class InstansiFactory extends Factory
{
    protected $model = Instansi::class;

    public function definition(): array
    {
        return [
            'nama_instansi' => $this->faker->company(),
            'alamat' => $this->faker->address(),
            'no_telp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
        ];
    }
}
