<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::InRandomOrder()->limit(20)->get();

        $teachers->each(function (Teacher $teacher) {
            $teacher->courses()->saveMany(Course::factory()->count(5)->make());
        });
    }
}
