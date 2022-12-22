<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Instructor;
use App\Models\Replies;
use App\Models\Threads;
use App\Models\User;
use App\Models\Admin;
use App\Models\User_details;
use App\Models\UsersCourses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Butrint',
            'email' => 'butrint@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('butrinti'),
            'remember_token' => Str::random(10),
        ]);
        Admin::factory()->create([
            'name' => 'blend',
            'email' => 'blend@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('butrinti'),
            'remember_token' => Str::random(10),
        ]);
        Instructor::factory()->create([
            'name' => 'elena',
            'email' => 'elena@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('butrinti'),
            'remember_token' => Str::random(10),
        ]);

        Admin::factory(3)->create();
        Instructor::factory(3)->create();
        User::factory(10)->create();
        User_details::factory(10)->create();
        Course::factory(10)->create();
        Threads::factory(10)->create();
        Replies::factory(10)->create();
        CourseUser::factory(5)->create();


    }
}
