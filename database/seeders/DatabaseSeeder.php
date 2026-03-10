<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@smpn41samarinda.my.id'],
            [
                'name' => 'Admin SMPN 41',
                'password' => Hash::make('password'),
            ]
        );

        // Teachers & Staff
        $this->call([
            TeacherSeeder::class,
        ]);
    }
}
