<?php

namespace Database\Factories;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    protected $model = Forum::class;

    public function definition()
    {
        return [
            'notice_id' => $this->faker->unique()->randomNumber(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(3, true),
            'banner_image' => 'resources/images/calidad-aire-medellin.webp',
            'author' => $this->faker->name(),
        ];
    }
}
