<?php

namespace Database\Factories;

use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ShortUrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ShortUrl::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'url' => fake()->url(),
            'code' => fake()->unique()->asciify(),
        ];
    }

}
