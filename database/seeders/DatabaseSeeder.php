<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserPrimarySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserPrimarySeeder::class,
            UniversitySeeder::class,
            MajorSeeder::class,
            CurriculumSeeder::class,
            UserSeeder::class,
        ]);

        $users = User::inRandomOrder()->get();
        $users = $users->chunk(280);

        $this->call(StudentSeeder::class,false,['users' => $users[0]]);
        $this->call(TeacherSeeder::class,false,['users' => $users[1]]);

        $this->call([
            CourseSeeder::class,
        ]);
    }
}
