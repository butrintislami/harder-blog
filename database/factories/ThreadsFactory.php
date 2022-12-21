<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Threads>
 */
class ThreadsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $instructor_id = Instructor::pluck('id')->toArray();
        $course_id = Course::pluck('id')->toArray();
        return [
            'instructor_id'=> Arr::random($instructor_id),
            'course_id'=> Arr::random($course_id),
            'thread'=> $this->faker->sentence(),
            'information'=>$this->faker->paragraph(4),

        ];
    }
}
