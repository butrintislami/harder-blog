<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
        $instructor_id = Instructor::pluck('id')->toArray();
        return [

            'instructor_id'=> Arr::random($instructor_id),
            'title'=> $this->faker->sentence(),
            'description'=>$this->faker->paragraph(4),
        ];
    }
}
