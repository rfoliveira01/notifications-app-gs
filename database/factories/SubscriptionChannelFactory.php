<?php

namespace Database\Factories;

use App\Models\SubscriptionChannel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionChannelFactory extends Factory
{
    protected $model = SubscriptionChannel::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'channel' => $this->faker->randomElement(SubscriptionChannel::SUBSCRIPTION_CHANNELS)
        ];
    }
}
