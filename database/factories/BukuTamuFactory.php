<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BukuTamu>
 */
class BukuTamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'no_telp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'waktu_kunjungan' => fake()->date(),
            'waktu_kepergian' => fake()->date(),
            'keperluan' => fake()->sentence(rand(3, 5)),
        ];
    }
}
