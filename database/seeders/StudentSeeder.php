<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($users): void
    {
        $users->each(function ($user) {
            $user->student()->create(Student::factory()->make()->toArray());
        });
    }
}
