<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsFactory extends Factory
{

    use DatabaseMigrations, RefreshDatabase;
    /**
     * Define the model's default state.
     * Вызывается при генерации каких-то данных
     * @return array
     */
    public function definition()
    {
        $title =$this->faker->jobTitle();
        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'author' => $this->faker->userName(),
            'status' => 'ACTIVE',
            'description' => $this->faker->text(150)
        ];
    }
}
