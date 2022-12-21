<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
,./

use App\Models\Instructor;
use App\Models\Replies;
use App\Models\Threads;
use App\Models\User;
use App\Models\Admin;
use App\Models\User_details;
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

        Admin::factory(3)->create();
        Instructor::factory(3)->create();
        User::factory(10)->create();
        User_details::factory(10)->create();
        Threads::factory(10)->create();
        Replies::factory(10)->create();

    }
}
