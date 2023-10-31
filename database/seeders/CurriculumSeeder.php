<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutions = Institution::inRandomOrder()->get();


        foreach ($institutions as $institutions) {
            $institutions->majors()->sync(Major::inRandomOrder()->limit(3)->get());
        }
    }
}
