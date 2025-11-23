<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'), // password default 'password'
            'telp' => fake()->numerify('0812########'), // Format no. HP Indonesia
            'tgl_lahir' => fake()->dateTimeBetween('-80 years', '-10 years'), // Umur 10-80 thn
            'jenis_kelamin' => fake()->randomElement(['Laki Laki', 'Perempuan']),
            'role' => 'pasien', // <-- PENTING: Default role adalah 'pasien'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
