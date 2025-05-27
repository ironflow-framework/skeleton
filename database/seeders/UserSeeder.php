<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;

class UserSeeder
{
    public function run(): void
    {
        // Seed 10 Users
        User::factory(5)->create();

        $factory = new UserFactory();
        $factory->createMany(5);
    }
}