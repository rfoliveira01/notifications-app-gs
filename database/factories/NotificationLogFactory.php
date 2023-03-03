<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\NotificationLog;
use App\Models\SubscriptionChannel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationLogFactory extends Factory
{
    protected $model = NotificationLog::class;

    public function definition()
    {
        return [
            'message_id' => Message::factory(),
            'user_id' => User::factory(),
            'channel' => $this->faker->randomElement(SubscriptionChannel::SUBSCRIPTION_CHANNELS)
        ];
    }
}
