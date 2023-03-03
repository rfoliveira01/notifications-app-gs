<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubscriptionCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionCategoryFactory extends Factory
{
    protected $model = SubscriptionCategory::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
