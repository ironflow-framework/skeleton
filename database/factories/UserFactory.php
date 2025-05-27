<?php

namespace Database\Factories;

use IronFlow\Database\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    protected string $model = User::class;

    protected function configure(): void
    {
        $this->states = [];
    }

    public function definition(): array
    {
        return [
            'name' => $this->fake->word,
        ];
    }
}