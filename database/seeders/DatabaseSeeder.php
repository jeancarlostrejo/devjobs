<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jean Carlos Trejo',
            'email' => 'test@test.com',
            'rol' => Role::RECRUITER
        ]);

        $this->call([
            SalarySeeder::class,
            CategorySeeder::class
        ]);
    }
}
