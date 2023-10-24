<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = University::inRandomOrder()->get();


        foreach ($universities as $universities) {
            $universities->majors()->sync(Major::inRandomOrder()->limit(3)->get());
        }
    }
}
