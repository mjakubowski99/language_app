<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use User\Infrastructure\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Student::factory()->create([
            'name' => 'Przemo',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret123')
        ]);
    }
}
