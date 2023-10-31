<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPrimarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'teacher',
            'email' => 'teacher@admin.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'student',
            'email' => 'student@admin.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now()
        ]);
    }
}
