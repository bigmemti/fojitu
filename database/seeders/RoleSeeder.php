<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name"=> "admin",
            'is_flexible' => 0,
            'is_appointable' => 0,
        ]);
        Role::create([
            "name"=> "teacher",
            'is_flexible' => 1,
            'is_appointable' => 0,
        ]);
        Role::create([
            "name"=> "student",
            'is_flexible' => 1,
            'is_appointable' => 0,
        ]);
        Role::create([
            "name"=> "user",
            'is_flexible' => 1,
            'is_appointable' => 1,
        ]);
    }
}