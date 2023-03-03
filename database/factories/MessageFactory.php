<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'category_id' => Category::factory(),
        ];
    }
}
