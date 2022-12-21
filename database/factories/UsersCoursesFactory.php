<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsersCoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::pluck('id')->toArray();
        $course_id = Course::pluck('id')->toArray();
        return [
            'user_id'=>Arr::random($user_id),
            'course_id'=>Arr::random($course_id),
        ];
    }
}
